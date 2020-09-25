<?php

namespace Project1;

class ViewManager {
    public function router() {

        // linkHeader();
        $wrapper = new Wrapper();
        $wrapper->header("Roy Spencer -- Project List");
        $wrapper->bodyStart();

        echo "hi";

        $wrapper->bodyEnd();
        $wrapper->footer();
        
        
    }

}