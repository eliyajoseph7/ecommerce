<?php

namespace App\Jobs;

use App\Models\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\ItemVisit;

class StoreItemVisit implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $itemId;
    protected $ipAddress;
    protected $userAgent;
    protected $referrer;
    protected $user_id;
    protected $session_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($itemId, $ipAddress, $userAgent, $referrer, $user_id, $session_id)
    {
        $this->itemId = $itemId;
        $this->ipAddress = $ipAddress;
        $this->userAgent = $userAgent;
        $this->referrer = $referrer;
        $this->user_id = $user_id;
        $this->session_id = $session_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        ItemVisit::create([
            'item_id' => $this->itemId,
            'ip_address' => $this->ipAddress,
            'user_agent' => $this->userAgent,
            'referrer' => $this->referrer,
            'user_id' => $this->user_id,
            'session_id' => $this->session_id,
        ]);
        Item::find($this->itemId)?->increment('clicks');
    }
}
