<?php

namespace app\modules\addressbook\admin\apis;

/**
 * Contact Controller.
 *
 * File has been created with `crud/create` command on LUYA version 1.0.0.
 */
class ContactController extends \luya\admin\ngrest\base\Api
{
    /**
     * @var string The path to the model which is the provider for the rules and fields.
     */
    public $modelClass = "app\modules\addressbook\models\Contact";


    /**
     * @action sale 返回图表信息
     */
    public function actionSale()
    {
        $options = ' {
              "title": {
                  "text": "商城渠道"
              },
              "tooltip": {},
              "legend": {
                  "data":["销量"]
              },
              "xAxis": {
                  "data": ["衬衫","羊毛衫","雪纺衫","裤子","高跟鞋","袜子"]
              },
              "yAxis": {},
              "series": [{
                  "name": "销量",
                  "type": "bar",
                  "data": [5, 20, 36, 10, 10, 20]
              }]
          }';

        return $options;
    }

    /**
     * @action sale 返回图表信息
     */
    public function actionSaleByWechat()
    {
        $options = ' {
              "title": {
                  "text": "微信渠道"
              },
              "tooltip": {},
              "legend": {
                  "data":["销量"]
              },
              "xAxis": {
                  "data": ["衬衫","羊毛衫","雪纺衫","裤子","高跟鞋","袜子"]
              },
              "yAxis": {},
              "series": [{
                  "name": "销量",
                  "type": "bar",
                  "data": [5, 20, 36, 10, 10, 20]
              }]
          }';

        return $options;
    }

    public function actionPolar()
    {


        $option = [];

        $option['tooltip'] = [
            'trigger' => 'item',
            'formatter' => "{a} <br/>{b}: {c} ({d}%)"
        ];
        $option['legend'] = [
            'orient' => "vertical",
            'x' => 'left',
            'data' => ['直接访问', '邮件营销', '联盟广告', '视频广告', '搜索引擎']
        ];

        $option['series'] = [
            [
                'name' => "访问来源",
                'type' => 'pie',
                'radius' => ['50%', '70%'],
                'avoidLabelOverlap' => false,
                'labelLine' => [
                    'normal' => [
                        'show' => false
                    ]
                ],
                'label' => [
                    'normal' => [
                        'show' => false,
                        'position' => 'center'
                    ],
                    'emphasis' => [
                        'show' => true,
                        'textStyle' => [
                            'fontSize' => '30',
                            'fontWeight' => 'bold'
                        ]
                    ]
                ],
                'data' => [
                    ['value' => 335, 'name' => '直接访问'],
                    ['value' => 310, 'name' => '邮件营销'],
                    ['value' => 234, 'name' => '联盟广告'],
                    ['value' => 135, 'name' => '视频广告'],
                    ['value' => 1234, 'name' => '搜索引擎'],
                ]

            ]
        ];

        return $option;

    }

}
