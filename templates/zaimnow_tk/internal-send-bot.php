<?php 
try { 
    $answer = $this->input->post("answer", TRUE);
    $question = $this->input->post("question", TRUE);
    $fingerprint = $this->input->post("fingerprint", TRUE);
    
    if(empty($answer) || empty($question) || empty($fingerprint))
    { 
        return;
    } 

    $data = array(
        'fingerprint' => $fingerprint,
        'question' => $question,
        'answer' => $answer,
        'site' => base_url(),
        'datetime' => date("Y-m-d H:i:s"),
    );
    $this->db->insert('bot-dialog', $data);
}
catch (Exception $e) {
    echo '<pre>';
    var_dump($e);
    echo '</pre>';
}

?>