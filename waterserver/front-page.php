<?php
/* Template Name: フロントページ用 */
?>
<?php get_header(); ?>
<script type="application/javascript">
  $(window).load(function() {
  });
</script>

<div id="main_contents" class="topcontent">
  <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/" id="footmark">
    <?php if (function_exists('bcn_display')) {
      bcn_display();
    } ?>
  </div>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div <?php post_class() ?> id="post-<?php the_ID(); ?>">


        <div class="entry">
          <?php the_content(); ?>
        </div><!-- / entry -->
      </div>
    <?php endwhile; ?>
  <?php else : ?>
    <h2>Not Found</h2>
  <?php endif; ?>
  <?php get_template_part('inc/searchform'); ?>

  


  <?php //ここからトップページ内容 
  ?>
  <div class="entry">
    <h3 class="toptitle">選んで絶対失敗しないウォーターサーバー TOP10！</h3>
    <?php
    $args = array(
      'post_type' => 'waterserver',
      'numberposts' => 10,
      'orderby' => 'meta_value_num',
      'meta_key' => 'recommend_order', //ACFのフィールド名
      'order' => 'ASC'
    );
    $posts = get_posts($args);
    
    if ($posts) :
      foreach ($posts as $post) : setup_postdata($post); ?>
        <table class="server">
          <tbody>
            <?php if (!is_mobile()) { ?>
              <tr>
                <td colspan="6" class="nobo">
                  <div class="point">
                    <?php the_field('recommend_headline'); ?>
                  </div>
                </td>
              </tr>
              <tr>
                <td colspan="6" class="text-center bblue">
                  <h3>
                    <img src="<?php bloginfo('template_directory'); ?>/img/rank<?php the_field('recommend_order'); ?>_a.gif" alt="" class="rank-img" />
                    <a href="<?php the_permalink(); ?>" rel="external nofollow" target="_blank"><span class="rank-txt"><?php the_title(); ?></span></a>
                  </h3>
                </td>
              </tr>
              <tr>
                <td colspan="2" class="gazo">
                  <a href="<?php the_permalink(); ?>" rel="external nofollow" class="">
                    <?php $gazo = get_field('mousikomi1');
                          if ($gazo) : ?>
                      <img src="<?php echo $gazo['banner1']['url']; ?>" alt="<?php echo $gazo['banner1']['alt']; ?>" />
                    <?php endif; ?>
                  </a>

                  <?php
                        $gazo2 = get_field('mousikomi2');
                        if ($gazo2) : ?>
                    <a href="<?php the_permalink(); ?>?type=2" rel="external nofollow" class="">
                      <img src="<?php echo $gazo2['banner2']['url']; ?>" alt="<?php echo $gazo2['banner2']['alt']; ?>" />
                    </a>
                  <?php endif; ?>
                  <?php
                        $gazo3 = get_field('mousikomi3');
                        if ($gazo3) : ?>
                    <a href="<?php the_permalink(); ?>?type=3" rel="external nofollow" class="">
                      <img src="<?php echo $gazo3['banner3']['url']; ?>" alt="<?php echo $gazo3['banner3']['alt']; ?>" />
                    </a>
                  <?php endif; ?>

                  <?php
                        $ourl = get_field('other_url');
                        $ogazo = get_field('other_gazo');
                        if ($ourl) : ?>
                    <a href="<?php echo $ourl; ?>" target="_blank">
                    <?php endif; ?>
                    <?php if ($ogazo) : ?>
                      <img src="<?php echo $ogazo['url']; ?>" alt="<?php echo $ogazo['alt']; ?>" />
                    <?php endif;
                          if ($ourl) : ?>
                    </a>
                  <?php endif; ?>
                </td>
                <td colspan="4" valign="middle" class="text-center">
                  <ul class="aka futo points"><?php the_field('recommend_gaiyou'); ?></ul><br>
                  <a href="<?php the_permalink(); ?>" target="_blank">⇒ <?php the_title(); ?>の詳細・申込はこちら</a>
                </td>
              </tr>
              <tr>
                <td colspan="6" class="text-center bblue">
                  <span class="futo">基本スペック</span>
                </td>
              </tr>
              <tr>
                <?php $spec = get_field('spec'); ?>
                <th>お水の価格（１本）</th>
                <td><?php echo number_format($spec['water_cost']); ?>円<?php echo $spec['water_cost2']; ?></td>
                <th>お水の種類</th>
                <td>
                  <?php
                        $field = get_field_object('water_type');
                        $water = $field['value'];
                        if ($water) :
                          ?>
                    <?php foreach ($water as $water) : ?>
                      <?php echo $field['choices'][$water]; ?>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </td>
                <th>サーバー代（月）</th>
                <td>
                <?php if(!preg_match("/[0-9]{4}/",$spec['server_cost'])) : ?>
                    <?php echo $spec['server_cost']; ?>
                    <?php echo $spec['server_cost2']; ?>
                    <?php else : ?>
                    <?php echo number_format($spec['server_cost']); ?>円
                    <?php echo $spec['server_cost2']; ?>
                <?php endif; ?>
                </td>
              </tr>
              <tr>
                <th>配送料</th>
                <td><?php echo $spec['shipping_cost']; ?></td>
                <th>ボトルの種類</th>
                <td>
                  <?php
                        $field = get_field_object('bottle');
                        $value = $field['value'];
                        $label = $field['choices'][$value];
                        ?>
                  <?php echo $label; ?>
                </td>
                <th>電気代（月）</th>
                <td>
                <?php if(!preg_match("/[0-9]{4}/",$spec['electricity_cost'])) : ?>
                    <?php echo $spec['electricity_cost']; ?>
                    <?php echo $spec['electricity_cost2']; ?>
                    <?php else : ?>
                    <?php echo number_format($spec['electricity_cost']); ?>円
                    <?php echo $spec['electricity_cost2']; ?>
                <?php endif; ?>
                
                </td>
              </tr>
              <tr>
                <th colspan="3">配送地域</th>
                <td colspan="3">
                  <?php
                        $field = get_field_object('shipping_area');
                        $value = $field['value'];
                        $label = $field['choices'][$value];
                        ?>
                  <?php echo $label; ?>
                </td>
              </tr>
              <tr>
                <td colspan="6" class="text-center bblue">調査結果（◎非常に優秀、○優秀、△まずまず、×ダメ）</td>
              </tr>
              <tr>
                <?php if (have_rows('kekka')) :
                        while (have_rows('kekka')) : the_row();
                          ?>
                    <th>お水の美味しさ</th>
                    <td>
                      <?php
                                $oisi = get_sub_field_object('oisisa');
                                $value = $oisi['value'];
                                $label = $oisi['choices'][$value];
                                ?>
                      <?php echo $label; ?>
                    </td>
                    <th>衛生管理</th>
                    <td>
                      <?php
                                $eise = get_sub_field_object('eisei');
                                $value = $eise['value'];
                                $label = $eise['choices'][$value];
                                ?>
                      <?php echo $label; ?>
                    </td>
                    <th>赤ちゃんや小さなお子さんに</th>
                    <td>
                      <?php
                                $baby = get_sub_field_object('baby');
                                $value = $baby['value'];
                                $label = $baby['choices'][$value];
                                ?>
                      <?php echo $label; ?>
                    </td>
              </tr>
              <tr>
                <th>便利度</th>
                <td>
                  <?php
                            $benr = get_sub_field_object('benrido');
                            $value = $benr['value'];
                            $label = $benr['choices'][$value];
                            ?>
                  <?php echo $label; ?>
                </td>
                <th>デザイン性</th>
                <td>
                  <?php
                            $deza = get_sub_field_object('dezain');
                            $value = $deza['value'];
                            $label = $deza['choices'][$value];
                            ?>
                  <?php echo $label; ?>
                </td>
                <th>健康やダイエットに</th>
                <td>
                  <?php
                            $heal = get_sub_field_object('health');
                            $value = $heal['value'];
                            $label = $heal['choices'][$value];
                            ?>
                  <?php echo $label; ?>
                </td>
              </tr>
              <tr>
                <th>省エネ</th>
                <td>
                  <?php
                            $eco = get_sub_field_object('eco');
                            $value = $eco['value'];
                            $label = $eco['choices'][$value];
                            ?>
                  <?php echo $label; ?>
                </td>
                <th>コスパ</th>
                <td>
                  <?php
                            $cospa = get_sub_field_object('cospa');
                            $value = $cospa['value'];
                            $label = $cospa['choices'][$value];
                            ?>
                  <?php echo $label; ?>
                </td>
                <th>満足度</th>
                <td>
                  <?php
                            $manzo = get_sub_field_object('manzoku');
                            $value = $manzo['value'];
                            $label = $manzo['choices'][$value];
                            ?>
                  <?php echo $label; ?>
                </td>
              <?php endwhile; ?>
            <?php endif; ?>
              </tr>

              <tr>
                <td colspan="6" class="fukid">
                  <p class="txt-img spnone"><img src="<?php bloginfo('template_directory'); ?>/img/hakase.png" align="right"></p>
                  <div class="bln balloon7">
                    <p class="img-r spnone"> </p>
                    <div class="b_body rnd1">
                      <?php the_field('recommend_description'); ?>
                    </div>

                  </div>
  <?php 
  $campaignTitle = get_field("campaign_title");
    $campaigndesRed = get_field("campaign_description_red");
   $campaigndes = get_field("campaign_description");
   ?>
                  <?php if ( $campaigndesRed == true || $campaigndes == true) : ?>
                  <div class="cam-box">
                      <img src="<?php bloginfo('template_directory'); ?>/img/present-2.png" alt="">
                      <div class="top-con">
                          <h4><?php echo $campaignTitle; ?>キャンペーン</h4>
                      </div>
                      <div class="bottom-con">
                          <div class="bottom-box">
                            <p class="cam-descript">
                                <span class="red"><?php echo $campaigndesRed; ?></span>
                                <?php echo $campaigndes; ?>
                                <!-- <span class="red">当サイト限定で2回目の注文時のボトル2本分が無料！
                                お申し込みの連絡欄に「TCP004」とご記載ください。</span>
                                記載が無い場合、限定キャンペーン対象外となってしまいますのでご注意ください。
                                2回目の注文時のボトル2本分が無料となり、それ以外のボトルは有料です。 -->
                            </p>
                          </div>
                      </div>
                  </div>
                  <?php else :?>
                  <?php endif; ?>
                    <br clear="all">
                  


                  <a href="<?php the_permalink(); ?>" target="_blank" class="button grad"><?php the_title(); ?>の公式サイトはこちら</a>
                  <p>&nbsp;</p>
                </td>
              </tr>
            <?php } else { ?>
              <?php get_template_part('inc/sptoku'); ?>
            <?php } ?>
          </tbody>
        </table>
      <?php endforeach; ?>
      <?php wp_reset_postdata(); ?>

    <?php endif; ?>
    <div class="accept">
      <?php
      $page_id = 1260;
      $page = get_post($page_id); ?>
      <p class="midasi em2 futo"><?php echo $page->post_title; ?></p>
      <?php echo $page->post_content; ?>
    </div>

    <?php
    $args = array(
      'post_type' => 'waterserver',
      'posts_per_page' => 1,
      'meta_key' => 'top_pickup',
      'meta_value' => '1'
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) :
      while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <table class="pickup server">
          <tbody>
            <tr>
              <td class="text-center bblue">
                <h3><span class="aka"><?php echo date("n月"); ?>のPICK UPサーバー</span> <a href="<?php the_permalink(); ?>" rel="external nofollow" target="_blank">『<?php the_title(); ?>』</a></h3>
              </td>
            </tr>
            <tr>
              <td class="gazo">
                <a href="<?php the_permalink(); ?>" rel="external nofollow" class="">
                  <img src="<?php the_field('pickup_gazo'); ?>" />
                </a>
              </td>
            </tr>
            <tr>
              <td>
                <div class="naiyo">
                  <?php the_field('pickup_gaiyou'); ?>
                  <?php echo date("Y年n月"); ?>のPICK UPサーバーは<a href="<?php the_permalink(); ?>" rel="external nofollow" target="_blank"><?php the_title(); ?>！</a><br>
                  <?php the_field('pickup_description'); ?>
                </div>
                <?php if (!is_mobile()) { ?>
                  <br><br><a href="<?php the_permalink(); ?>" target="_blank" class="button grad pickbutton"><?php the_title(); ?>の公式サイトはこちら</a>
                <?php } else { ?>

                  <a href="<?php the_permalink(); ?>" target="_blank" class="button grad pickbutton">公式サイトはこちらから</a>
                <?php } ?>
              </td>
            </tr>
          </tbody>
        </table>
    <?php
      endwhile;
    endif;
    wp_reset_postdata();
    ?>
  </div><!-- / entry -->
  <?php get_template_part('inc/searchform2'); ?>

  <?php if (!is_mobile()) : ?>
  <div style="text-align: center; margin-top: 30px">
    <a style="display:block; margin: auto; width: 600px" href="https://waterserver.love/link/frecious.html?type=4" rel="external nofollow" target="_blank">
      <img src="<?php bloginfo('template_directory'); ?>/img/frecious_slatcafe_f1box_468_60.jpg" alt="" width="100%">
    </a>
  </div>
  <?php else : ?>
  <div style="text-align: center; padding: 40px 10px 0;">
    <a style="display:block;  width: 90%; margin: auto;" href="https://waterserver.love/link/frecious.html?type=4" rel="external nofollow" target="_blank">
      <img src="<?php bloginfo('template_directory'); ?>/img/frecious_slatcafe_f1box_400_400.jpg" alt="">
    </a>
  </div>
  <?php endif; ?>

</div><!-- / main contents box -->
</div><!-- / contents box -->
<?php get_footer(); ?>