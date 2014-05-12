<?php
class AlisiosFunctionsSocial {

    /**
     * Filter for the namespace, adding the OpenGraph namespace.
     * @link https://developers.facebook.com/docs/web/tutorials/scrumptious/open-graph-object/
     * @param string $input The language_attributes filter
     * @return string
     */
    public function add_opengraph_namespace( $input ) {
        return $input . ' prefix="og: http://ogp.me/ns#"';
    }
}