<?php
namespace OrthodoxyClient
{
    class Api
    {
        private $_baseUrl;

        public function __construct($apiUrl)
        {
            $this->_baseUrl = $apiUrl;
        }

        private function _request($url)
        {
            $ch = curl_init();
            var_dump($url);
            curl_setopt($ch, CURLOPT_URL, $url);
            //do not output directly, use variable
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            //do a binary transfer
            curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
            //stop if an error occurred
            curl_setopt($ch, CURLOPT_FAILONERROR, 1);
            $info = curl_exec($ch);
            if (curl_errno($ch)) {
                return false;
            }

            return json_decode($info);
        }

        public function getDay($day, $fomat='json')
        {
            return $this->_request(
                "{$this->_baseUrl}api/calendar/{$day}.{$fomat}"
            );
        }

        public function getEventInfo($eventId, $fomat='json')
        {
            return $this->_request(
                "{$this->_baseUrl}api/event/{$eventId}.{$fomat}"
            );
        }

        public function getArticleInfo($articleId, $fomat='json')
        {
            return $this->_request(
                "{$this->_baseUrl}api/article/{$eventId}.{$fomat}"
            );
        }

        public function getArticlesByTag($articleTag, $fomat='json')
        {
            return $this->_request(
                "{$this->_baseUrl}api/article/tag/{$articleTag}.{$fomat}"
            );
        }
    }
}