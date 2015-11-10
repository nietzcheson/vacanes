<?php

namespace AppBundle\Utils;

class ResponseBag
{

    public function bag($response = null, $msn = null, $content = null)
    {

        /**
         * @return int      (1 = Error, 2 = Success, 3 = Exception)
         * @return msn      (message)
         * @return content  (content response)
         */

        return array(
            'response' => $response,
            'msn' => $msn,
            'content' => $content
        );
    }

}


?>
