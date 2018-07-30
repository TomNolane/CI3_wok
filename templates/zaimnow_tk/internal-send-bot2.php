<?php 
try { 
    $answer = $this->input->post("answer", TRUE);
    $fingerprint = $this->input->post("fingerprint", TRUE);
    $question = $this->input->post("question", TRUE);
    $source = $this->input->post("source", TRUE);
    $procent = $this->input->post("procent", TRUE);
    
    if(empty($answer) || empty($question) || empty($source) || empty($source))
    { 
        return;
    } 

    $data = array(
        'fingerprint' => $fingerprint,
        'question' => $question,
        'answer' => $answer,
        'site' => base_url(),
        'datetime' => date("Y-m-d H:i:s"),
        'source' => $source,
        'procent' => $procent
    );
    $this->db->insert('bot-dialog', $data);
}
catch (Exception $e) {
    echo '<pre>';
    var_dump($e);
    echo '</pre>';
}

?>