<?php
class AlisiosFunctionsSocial {

    /**
     * Filter for the namespace, adding the OpenGraph namespace.
     * @link https://developers.facebook.com/docs/web/tutorials/scrumptious/open-graph-object/
     * @link https://developers.google.com/+/web/snippet/
     * @param string $input The language_attributes filter
     * @return string
     */
    public static function add_html_namespace( $input ) {
        //OpenGraph - Facebook
        $input .= ' prefix="og: http://ogp.me/ns#"';
        //Schema - Google+
        $schemaType = apply_filters('alisios_schema_type', 'Blog');
        $input .= ' itemscope itemtype="http://schema.org/' . $schemaType . '"';

        return $input;
    }

}
