<?php

class MY_Loader extends CI_Loader {

    public function front($template_name, $vars = array(), $return = FALSE) {
        $content = $this->view('public/template/header', $vars, $return);
        $content .= $this->view('public/' . $template_name, $vars, $return);
        $content .= $this->view('public/template/footer', $vars, $return);

        if ($return) {
            return $content;
        }
    }

    public function gerard($template_name, $vars = array(), $return = FALSE) {
        $content = $this->view('gerard/template/header', $vars, $return);
        $content .= $this->view('gerard/' . $template_name, $vars, $return);
        $content .= $this->view('gerard/template/footer', $vars, $return);

        if ($return) {
            return $content;
        }
    }

}