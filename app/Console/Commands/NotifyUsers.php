<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\NotifyMail;
use App\Sale;
use App\Seller;
use Mail;
use DB;

class NotifyUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify sellers about sales';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Sale $saleModel, Seller $sellerModel)
    {
        parent::__construct();
        $this->saleModel = $saleModel;
        $this->sellerModel = $sellerModel;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $sellers = $this->sellerModel->all();

        foreach($sellers as $seller){

            $sales = $this->saleModel->select(DB::raw('SUM(sale.sale_value) as sale_values, SUM(sale.commission) as commissions'))
                                ->where('sale.seller_id', $seller->id)
                                ->where(DB::raw('DATE(sale.created_at)'), date('Y-m-d'))
                                ->first();

            Mail::send(new NotifyMail((object)[
                'name' => $seller->name,
                'email' => $seller->email,
                'totalSales' => $sales->sale_values,
                'totalCommissions' => $sales->commissions,
            ]));

        }
    }
}
