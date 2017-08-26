<?php
namespace App\Handlers;

use LINE\LINEBot;
use LINE\LINEBot\Event\PostbackEvent as LINEBotPostbackEvent;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;

class PostbackEventHandler
{
    /** @var \LINE\LINEBot */
    protected $bot;
    /** @var \LINE\LINEBot\Event\PostbackEvent */
    protected $event;
    /**
     * Create a new event instance.
     *
     * @param \LINE\LINEBot $bot
     * @param \LINE\LINEBot\Event\PostbackEvent $event
     */
    public function __construct(LINEBot $bot, LINEBotPostbackEvent $event)
    {
        $this->bot = $bot;
        $this->event = $event;
    }
    /**
     * Handle the event.
     *
     * @return \LINE\LINEBot\Response
     */
    public function handle()
    {
        $reply = $this->event->getPostbackData();

        $fortunes = [
            '今日はいいことがありそう！',
            'ざんね～ん、今日は調子が出ないかも(T T)',
            '普通の一日を過ごします',
            'やっった！！大吉です！！！！',
        ];

        switch ($reply) {
            case 1:
                $m = "アラビアンナイトを選んだあなたは、\n".$fortunes[array_rand($fortunes)];
                break;
            case 2:
                $m = "真夏を選んだあなたは、\n".$fortunes[array_rand($fortunes)];
                break;
            case 3:
                $m = "ノーティーガールを選んだあなたは、\n".$fortunes[array_rand($fortunes)];
                break;
            case 4:
                $m = "金魚娘を選んだあなたは、\n".$fortunes[array_rand($fortunes)];
                break;
        }

        $builder = new TextMessageBuilder($m);
        return $this->bot->replyMessage(
            $this->event->getReplyToken(),
            $builder
        );
    }
}
