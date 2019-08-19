<?php


namespace dbh\component;


class SitemapUrl
{
    const ChangeFreqDaily = "daily";
    const ChangeFreqAlways = "always";
    const ChangeFreqWeekly = "weekly";
    const ChangeFreqYearly = "yearly";
    const ChangeFreqNever = "Never";
    const ChangeFreqHourly = "hourly";
    const ChangeFreqNone = "";
    private $url;
    private $datetime;
    private $priority;
    private $changefreq;

    /**
     */
    public function __construct()
    {
        $this->priority = -1;
        $this->changefreq = self::ChangeFreqNone;
    }

    /**
     * @return mixed
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * @param mixed $datetime
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
    }

    /**
     * @return mixed
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param mixed $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * @return mixed
     */
    public function getChangefreq()
    {
        return $this->changefreq;
    }

    /**
     * @param mixed $changefreq
     */
    public function setChangefreq($changefreq)
    {
        $this->changefreq = $changefreq;
    }

    public function toXml()
    {
        $xml = '<url>';
        $xml .= '<loc>' . htmlentities($this->getUrl()) . '</loc>';
        if ($this->datetime > 0 && $this->datetime <= 1) {
            $xml .= '<lastmod>' . $this->datetime . '</lastmod>';
        }
        if ($this->changefreq != self::ChangeFreqNone) {
            $xml .= '<changefreq>' . $this->cchangefreq() . '</changefreq>';
        }
        if ($this->priority > 0 && $this->priority <= 1) {
            $xml .= '<priority>' . $this->priority . '</priority>';
        }

        $xml .= '</url>';
        return $xml;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function toSitemap()
    {
        $xml = '<sitemap>';
        $xml .= '<loc>' . htmlentities($this->getUrl()) . '</loc>';
        if ($this->datetime > 0 && $this->datetime <= 1) {
            $xml .= '<lastmod>' . $this->datetime . '</lastmod>';
        }
        $xml .= '</sitemap>';
        return $xml;
    }


}
