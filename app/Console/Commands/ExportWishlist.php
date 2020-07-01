<?php

namespace App\Console\Commands;

use App\Admin;
use App\AdminWishlist;
use App\Products;
use App\User;
use App\Wishlist;
use Illuminate\Console\Command;

class ExportWishlist extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:wishlist  ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $source = $this->choice(
            'Which source would you like to use?',
            ['Customers', 'Consumers']
        );
        $this->info("Started downloading  $source CSV file ");

        $this->output->progressStart(10);

        for ($i = 0; $i < 1; $i++) {
            sleep(0.01);
            $this->output->progressAdvance();
        }

        $this->output->progressFinish();
        if ($source == 'Customers') {
            $user_wishlists = Wishlist::all('id', 'product_id', 'user_id');
            $user_wish = json_decode($user_wishlists, true);
            $user_csv = [];
            $user_wishcsv = [];
            foreach ($user_wish as $wish) {
                $user = User::find($wish['user_id'])->name;
                $product = Products::find($wish['product_id'])['name'];
                $user_csv[$wish['user_id']][] = [$wish['id'], $wish['product_id']];
                $user_wishcsv[$user][] = [$wish['id'], $product];
            }
            $outputCsv = [];
            $headers = ['NAME', 'WISHLIST TITLE', 'NO Of ITEMS'];
            array_push($outputCsv, $headers);
            foreach ($user_wishcsv as $key => $item) {
                $outputCsv[] = [$key, $key . ' WishList', count($user_wishcsv[$key])];
            }

            $fp = fopen('public/export/customers.csv', 'wb');

            foreach ($outputCsv as $fields) {
                fputcsv($fp, $fields);
            }

            fclose($fp);
            $this->info('Created Customer Csv see file public/export/customer.csv');
        } elseif ($source == 'Consumers') {
            $wishlists = AdminWishlist::all('id', 'product_id', 'admin_id');
            $mywish = json_decode($wishlists, true);
            $csv = [];
            $wishcsv = [];
            foreach ($mywish as $wish) {
                $admin = Admin::find($wish['admin_id'])->name;
                $product = Products::find($wish['product_id'])->name;
                $csv[$wish['admin_id']][] = [$wish['id'], $wish['product_id']];
                $wishcsv[$admin][] = [$wish['id'], $product];
            }
            $outputCsv = [];
            $headers = ['NAME', 'WISHLIST TITLE', 'NO Of ITEMS'];
            array_push($outputCsv, $headers);
            foreach ($wishcsv as $key => $item) {
                $outputCsv[] = [$key, $key . ' WishList', count($wishcsv[$key])];
            }

            $fp = fopen('public/export/consumers.csv', 'wb');

            foreach ($outputCsv as $fields) {
                fputcsv($fp, $fields);
            }
            fclose($fp);
            $this->info('Created Consumer Csv see file public/export/consumer.csv');
        }


    }
}
