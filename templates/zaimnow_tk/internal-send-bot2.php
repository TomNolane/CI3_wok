<?php 
try { 
    $answer = $this->input->post("answer", TRUE);
    $question = $this->input->post("question", TRUE);
    $source = $this->input->post("source", TRUE);
    
    if(empty($answer) || empty($question) || empty($source))
    { 
        return;
    } 

    $data = array(
        'fingerprint' => 0,
        'question' => $question,
        'answer' => $answer,
        'site' => base_url(),
        'datetime' => date("Y-m-d H:i:s"),
        'source' => $source
    );
    $this->db->insert('bot-dialog', $data);
}
catch (Exception $e) {
    echo '<pre>';
    var_dump($e);
    echo '</pre>';
}

?>