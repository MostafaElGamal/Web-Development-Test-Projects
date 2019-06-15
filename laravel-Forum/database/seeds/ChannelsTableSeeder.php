<?php
use App\Channel;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $cahannels =  Channel::create([
        'name' => 'laravel',
        'slug' => str_slug('Laravel 5.8')
      ]);

      $cahannels =  Channel::create([
        'name' => 'VueJS3',
        'slug' => str_slug('VueJS 5.8')
      ]);

      $cahannels =  Channel::create([
        'name' => 'Angelr7',
        'slug' => str_slug('Angelr7 5.8')
      ]);

      $cahannels =  Channel::create([
        'name' => 'Node js',
        'slug' => str_slug('Node js 5.8')
      ]);
    }
}
