<?php
namespace Seonity\Helpers;

class Html
{
    public static function getYoutubeScreenMax($video_id) {
        return "http://img.youtube.com/vi/{$video_id}/maxresdefault.jpg";
    }

    public static function getYoutubeScreenS($video_id) {
        return "https://img.youtube.com/vi/{$video_id}/0.jpg";
    }
}