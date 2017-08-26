<?php

namespace App\Builders;

use App\Builders\MessageBuilder;

use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;

use App\Post;

/**
 * 募集中の経験談
 */
class BoshuMessageBuilder implements MessageBuilder
{
    /** @var string */
    private $message = '経験談の募集投稿を紹介しますね！';
    /** @var string */
    private $packageId = '1';
    /** @var string */
    private $stickerId = '124';
    /**
     * Build a message.
     *
     * @return \LINE\LINEBot\MessageBuilder
     */
    public function build()
    {
        $post = Post::open()->inRandomOrder()->first();
        if (!$post) {
            return new TextMessageBuilder('募集投稿は見つかりませんでした！');
        }
        
        $t = new TextMessageBuilder($this->message);
        $s = new StickerMessageBuilder($this->packageId, $this->stickerId);
        $p = new TextMessageBuilder($post->body . "\n\n" . route('posts.show', $post->id));
        return (new MultiMessageBuilder())
                    ->add($t)
                    ->add($s)
                    ->add($p)
                    ;
    }
}