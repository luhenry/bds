<?php

/**
 * Description of bdsStatistiquesFilter
 *
 * @author ludovic
 */
class bdsStatistiquesFilter extends sfFilter {

    /**
     * Executes this filter.
     *
     * @param sfFilterChain $filterChain A sfFilterChain instance
     */
    public function execute($filterChain) {
        $start = microtime(true);

        $filterChain->execute();

        $request = $this->getContext()->getRequest();
        $response = $this->getContext()->getResponse();

        if (($request instanceof sfWebRequest) && ($response instanceof sfWebResponse)) {
            $stat = new stStatistique(null, true);
            $stat->set('response_delay', microtime(true) - $start);
            $stat->set('response_status_code', $response->getStatusCode());
            $stat->set('response_content_type', $response->getContentType());
            $stat->set('request_method', $request->getMethod());
            $stat->set('request_uri', $request->getUri());
            $stat->set('request_remote_addr', $request->getRemoteAddress());
            $stat->set('request_acceptable_content_types', implode(',', $request->getAcceptableContentTypes()));
            $stat->set('request_charsets', implode(',', $request->getCharsets()));
            $stat->set('request_content_type', $request->getContentType());
            $stat->set('request_languages', implode(',', $request->getLanguages()));
            $stat->set('request_http_user_agent', $_SERVER['HTTP_USER_AGENT']);
            $stat->save();
        }
    }

}