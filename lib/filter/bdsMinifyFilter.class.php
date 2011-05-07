<?php

require_once 'Minify/HTML.php';

/**
 * Description of bdsMinifyFilter
 *
 * @author ludovic
 */
class bdsMinifyFilter extends sfFilter {

    /**
     * Executes this filter.
     *
     * @param sfFilterChain $filterChain A sfFilterChain instance
     */
    public function execute($filterChain) {
        $filterChain->execute();

        $response = $this->getContext()->getResponse();

        if ($response instanceof sfWebResponse) {
            $minify_HTML = new Minify_HTML($response->getContent(), array('xhtml' => true));

            $response->setContent($minify_HTML->process());
        }
    }

}