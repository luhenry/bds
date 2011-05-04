<?php

if ($pager->haveToPaginate()) {
    echo link_to('<< ', $route, array_merge(is_null($args)  ? array() : $args, array('page' => $pager->getFirstPage())));
    echo link_to('<', $route, array_merge(is_null($args) ? array() : $args, array('page' => $pager->getPreviousPage())));

    foreach ($pager->getLinks() as $page)
        echo '&nbsp;', $page != $pager->getPage() ? link_to($page, $route, array_merge(is_null($args) ? array() : $args, array('page' => $page))) : $page, '&nbsp;';

    echo link_to('>', $route, array_merge(is_null($args) ? array() : $args, array('page' => $pager->getNextPage())));
    echo link_to(' >>', $route, array_merge(is_null($args) ? array() : $args, array('page' => $pager->getLastPage())));
}