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
    public function actionSale(){
      $options = ' {
              "title": {
                  "text": "ECharts 入门示例"
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



}
