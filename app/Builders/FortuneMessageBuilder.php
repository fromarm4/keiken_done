<?php

namespace App\Builders;

use App\Builders\MessageBuilder;

use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder;
use LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder;

/**
 * うらない
 */
class FortuneMessageBuilder implements MessageBuilder
{
    /** @var string */
    private $message = "イラストを紹介します。";
    /** @var array */
    private $fortunes = [];

    public function __construct()
    {
        $this->fortunes = [
            [
                'title' => 'アラビアンナイト',
                'text' => 'ベリーダンスを踊る人を描いてみたかった',
                'thumbnailImageUrl' => env('LINE_IMAGE_URL').'/images/illust1.jpg',
                'actionBuilders' => [new PostbackTemplateActionBuilder('選ぶ', 1)]
            ],
            [
                'title' => '真夏',
                'text' => 'ガスマスクを被った女の子が描きたかった',
                'thumbnailImageUrl' => env('LINE_IMAGE_URL').'/images/illust2.JPG',
                'actionBuilders' => [new PostbackTemplateActionBuilder('選ぶ', 2)]
            ],
            [
                'title' => 'ノーティーガール',
                'text' => 'ちょっとロックでノーティーな感じの女の子が描きたかった',
                'thumbnailImageUrl' => env('LINE_IMAGE_URL').'/images/illust3.JPG',
                'actionBuilders' => [new PostbackTemplateActionBuilder('選ぶ', 3)]
            ],
            [
                'title' => '金魚娘',
                'text' => '金魚鉢の中に人を入れたら何人入るかなと思って描きはじめた',
                'thumbnailImageUrl' => env('LINE_IMAGE_URL').'/images/illust4.PNG',
                'actionBuilders' => [new PostbackTemplateActionBuilder('選ぶ', 4)]
            ],
        ];
    }

    /**
     * Build a message.
     *
     * @return \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder
     */
    public function build()
    {
        $columns = [];
        foreach ($this->fortunes as $fortune) {
            $columns[] = new CarouselColumnTemplateBuilder(
                                $fortune['title'],
                                $fortune['text'],
                                $fortune['thumbnailImageUrl'],
                                $fortune['actionBuilders']
                            );
        }

        $builder = new TemplateMessageBuilder(
            $this->message,
            new CarouselTemplateBuilder($columns)
        );
        return $builder;
    }
}