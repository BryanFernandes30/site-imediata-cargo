<?php
// Hostinger: envia as cotações do site para o e-mail comercial.
$DESTINO   = 'comercial@imediatacargo.com.br';
$REMETENTE = 'comercial@imediatacargo.com.br'; // e-mail do próprio domínio

header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); echo json_encode(['ok'=>false,'error'=>'method']); exit; }

$d = json_decode(file_get_contents('php://input'), true);
if (!is_array($d)) { http_response_code(400); echo json_encode(['ok'=>false,'error'=>'invalid']); exit; }
if (!empty($d['website'])) { echo json_encode(['ok'=>true]); exit; } // honeypot anti-spam

$clean = fn($v) => trim(preg_replace('/[\r\n]+/', ' ', strip_tags((string)($v ?? ''))));
$email = filter_var($clean($d['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$empresa = $clean($d['empresa'] ?? '');
if (!$email || $empresa === '') { http_response_code(422); echo json_encode(['ok'=>false,'error'=>'campos']); exit; }

$vol = '';
foreach (($d['volumes'] ?? []) as $i => $v) {
  $vol .= sprintf("  %d) %s un. — %s x %s x %s cm\n", $i+1, $clean($v['quantidade'] ?? ''), $clean($v['comprimento_cm'] ?? ''), $clean($v['largura_cm'] ?? ''), $clean($v['altura_cm'] ?? ''));
}

$corpo  = "NOVA SOLICITAÇÃO DE COTAÇÃO\n\n";
$corpo .= "Empresa: $empresa\nE-mail: $email\nTelefone: " . $clean($d['telefone'] ?? '') . "\n\n";
$corpo .= "Origem: " . $clean($d['origem'] ?? '') . "\nDestino: " . $clean($d['destino'] ?? '') . "\n\n";
$corpo .= "Peso total: " . $clean($d['peso_kg'] ?? '') . " kg\n";
$corpo .= "Volumes:\n$vol";
$corpo .= "Cubagem total: " . $clean($d['cubagem_m3'] ?? '') . " m³\n";
$corpo .= "Valor da NF: R$ " . $clean($d['nota_fiscal_rs'] ?? '') . "\n";

$headers  = "From: Site Imediata Cargo <$REMETENTE>\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8\r\n";
$assunto  = '=?UTF-8?B?' . base64_encode("Cotação de frete — $empresa") . '?=';

$ok = mail($DESTINO, $assunto, $corpo, $headers);
if (!$ok) http_response_code(500);
echo json_encode(['ok'=>$ok]);
