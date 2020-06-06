<?php


namespace beejeetest\Services;


class Paginate
{
    private $limit;
    private $total;

    /**
     * Paginate constructor.
     * @param int $limit
     * @param int $total
     */
    public function __construct($limit, $total)
    {
        $this->limit = $limit;
        $this->total = $total;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    public function getPagesQuantity()
    {
        return (integer)(($this->total-1) / $this->limit) + 1;
    }

    public function getPages()
    {
        $qw = $this->getPagesQuantity();
        return range(1, $qw);
    }

    public function getPagesHtml($prefixUrl)
    {
        $pages = $this->getPages();
        $htmls = [];
        foreach ($pages as $page) {
            $htmls[] = '<a href="'.$prefixUrl.'page='.$page.'">'.$page.'</a>';
        }
        return implode(' | ', $htmls);
    }



}