<?php

// Récupérer la valeur du champ de recherche depuis la requête AJAX
$userInput = $_POST['query'];
$response = array('success' => true, 'violations' => array());

// Vérifier la présence de caractères spéciaux
$specialCharactersRegex = '/[^a-zA-Z0-9 -\séè]/u';
if (preg_match($specialCharactersRegex, $userInput, $matches)) {
    $response['success'] = false;
    $response['violations'][] = array('type' => 'Caractère spécial', 'value' => $matches[0]);
}

// Vérifier la présence de mots-clés SQL
$sqlKeywords = array("SELECT", "UPDATE", "DELETE", "FROM", "WHERE", "AND", "OR", "INSERT", "INTO", "VALUES", "CREATE", "TABLE", "DROP", "ALTER", "INDEX", "VIEW", "JOIN", "INNER", "OUTER", "LEFT", "RIGHT", "FULL", "GROUP", "BY", "ORDER", "HAVING", "LIMIT");

foreach ($sqlKeywords as $keyword) {
    if (stripos($userInput, $keyword) !== false) {
        $response['success'] = false;
        $response['violations'][] = array('type' => 'Mot-clé SQL', 'value' => $keyword);
    }
}

// Envoyer la réponse au format JSON
header('Content-Type: application/json');
echo json_encode($response);
exit();
?>
