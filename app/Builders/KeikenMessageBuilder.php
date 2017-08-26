<?php

namespace App\Builders;

use App\Builders\MessageBuilder;

use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;

use App\Comment;

/**
 * 募集中の経験談
 */
class KeikenMessageBuilder implements MessageBuilder
{
    /** @var string */
    private $message = '経験談投稿を紹介しますね！';
    /** @var string */
    private $packageId = '1';
    /** @var string */
    private $stickerId = '119';
    /**
     * Build a message.
     *
     * @return \LINE\LINEBot\MessageBuilder
     */
    public function build()
    {
        $comment = Comment::whereHas('post', function($q)
                        {
                            $q->open();

                        })->inRandomOrder()->first();

        if (!$comment) {
            return new TextMessageBuilder('経験談は見つかりませんでした！');
        }

        $t = new TextMessageBuilder($this->message);
        $s = new StickerMessageBuilder($this->packageId, $this->stickerId);
        $c = new TextMessageBuilder($comment->post->body . "\n-------------------------\n\n" . $comment->body . "\n\n" . route('posts.show', $comment->post->id));
        return (new MultiMessageBuilder())
                    ->add($t)
                    ->add($s)
                    ->add($c)
                    ;
    }
}