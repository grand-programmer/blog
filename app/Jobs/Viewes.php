<?php

namespace App\Jobs;

use App\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class Viewes implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->article=$article;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $article=Article::find($this->article)->first();
        DB::transaction(function () use ($article) {
            $article->view()->updateOrCreate(
                ['article_id'=>$article->id],
                [
                    'viewed' => $article->view_count + 1,
                ]
            );
        });
    }
}
