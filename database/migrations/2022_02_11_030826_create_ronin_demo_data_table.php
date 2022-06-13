<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('ronin_demo_data', function (Blueprint $table) {
      $table->id();
      $table->string('ronin_id', 40)->nullable(false)->unique();
      $table->string('name', 40)->nullable(false);
      $table->timestamps();
    });

    DB::table('ronin_demo_data')->insert([
      // Reinaldo
      [
        'ronin_id' => 'c6e68614747e61322583a24a897e9ad57f2f97eb',
        'name' => 'Reinaldo'
      ],
      // School 02
      /*
      [
        'ronin_id' => 'e94fd04b4a7e23cb9d246a03efb737beb43f0fdc',
        'name' => 'Martinelli'
      ],
      // School 03
      [
        'ronin_id' => '52795ab058babaa0038171a40f77d0483994ae58',
        'name' => 'School 03'
      ],
      */
      // Rony
      [
        'ronin_id' => '43f8a8fc45adfc996b9cdfeb9b581136774f03f7',
        'name' => 'Rony'
      ],
      // Ronito
      [
        'ronin_id' => '83843640a8dc7b0008ef13e3bf3b763d52627d32',
        'name' => 'Ronito'
      ],
      // School 06
      /*
      [
        'ronin_id' => 'f721b079c6edd406a037a848de426c128bfcd7f6',
        'name' => 'School 06'
      ],
      */
      // Edixon
      [
        'ronin_id' => '24c52ebf3baf06b92c0cc6462ed991f73f92f72a',
        'name' => 'Edixon'
      ],
      // School 08
      /*
      [
        'ronin_id' => '10b1bc58f09165d158d81e847cf8d6210c50b3e7',
        'name' => 'Ander II'
      ],
      */
      // Ylam
      [
        'ronin_id' => '35fb35c96c262c96504467b9b59fbac7ca8d4b68',
        'name' => 'Ylam'
      ],
      // Tefy
      [
        'ronin_id' => 'e65447c887d225f9d526687487673132679319b2',
        'name' => 'Tefy'
      ],
      // School 11
      /*
      [
        'ronin_id' => 'fc538f63cd60a3a12af2ac2c93f884bfc7670958',
        'name' => 'School 11'
      ],
      */
      // Nene
      [
        'ronin_id' => 'd503f517b69e2b94ade2f4c40dfee879e0752f2b',
        'name' => 'Luis Nene'
      ],
      // Yrvim
      [
        'ronin_id' => '44316de0ef0b84d76a757bd2cb8bf771a7e04a96',
        'name' => 'Yrvim'
      ],
      // School 14
      /*
      [
        'ronin_id' => 'a5b4059bafdb47f60258404671c0cda8485b1437',
        'name' => 'School 14'
      ],
      // School 15
      [
        'ronin_id' => 'ddaf3ad3278d5018f3274451244045f122294144',
        'name' => 'School 15'
      ],
      */
      // Ronny
      [
        'ronin_id' => 'a4e6500f080fc91708dd4e641afe420e117876cb',
        'name' => 'Ronny'
      ],
      // School 17
      /*
      [
        'ronin_id' => 'f436623273d5c95f66d6012f44323dea357d29ba',
        'name' => 'School 17'
      ],
      */
      // Ander
      [
        'ronin_id' => '6a8b7f2730961d5e296c656bb25e51af19039717',
        'name' => 'Ander'
      ],
      // School 19
      /*
      [
        'ronin_id' => '611add1ed041610554c64587f5c6f815ce85e454',
        'name' => 'School 19'
      ],
      // School 20
      [
        'ronin_id' => '38ee95f125e6ad9de4421e3c4d0d65cae352fb8e',
        'name' => 'School 20'
      ],
      */
      // Argenis Acosta
      [
        'ronin_id' => '157f7e8cfb55f3b9b70089fbd89774e59ebe69a7',
        'name' => 'Argenis'
      ],
      // School 22
      /*
      [
        'ronin_id' => '70de1375038a47f287f76c6ca40be86e83094858',
        'name' => 'Argenis'
      ],
      */
    ]);
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('ronin_demo_data');
  }
};
