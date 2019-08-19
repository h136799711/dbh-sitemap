<?php


namespace dbh\component;

/**
 *
 * Class Sitemap
 * @package dbh\component
 */
class Sitemap
{
    const XML = "xml";
    const Text = "txt";
    const SitemapIndex = "sitemap_index";

    /**
     * 创建站点地图索引
     * @param $urlArray
     * @return string
     */
    public static function createSitemapIndex($urlArray)
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach ($urlArray as $vo) {
            if ($vo instanceof SitemapUrl) {
                $xml .= $vo->toSitemap();
            }
        }
        $xml .= '</sitemapindex>';
        return $xml;
    }

    /**
     * @param $urlArray
     * @return string
     */
    public static function createTextUrl($urlArray)
    {
        $xml = '';
        foreach ($urlArray as $vo) {
            if ($vo instanceof SitemapUrl) {
                $xml .= $vo->getUrl() . "\r\n";
            }
        }
        return $xml;
    }

    /**
     * 创建xml url 站点地图内容
     * @param array $urlArray 元素必须是 SitemapUrl 对象
     * @return string
     */
    public static function createXMLUrl($urlArray)
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach ($urlArray as $vo) {
            if ($vo instanceof SitemapUrl) {
                $xml .= $vo->toXml();
            }
        }
        $xml .= '</urlset>';
        return $xml;
    }


}
