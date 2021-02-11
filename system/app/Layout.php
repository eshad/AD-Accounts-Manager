<?php

/*
 * The MIT License
 *
 * Copyright 2019 cjacobsen.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace System\App;

/**
 * Description of Layout
 *
 * @author cjacobsen
 */

use App\App\App;
use System\Common\CommonLayout;
use App\Models\Database\AppDatabase;

class Layout extends CommonLayout
{


    //put your code here
    function __construct(App $app)
    {
        parent::__construct($app);
        $this->title = $this->getPageTitle($app);
        AppLogger::get()->debug("Active Layout: " . $this->layoutName);
    }

    private function getPageTitle($app)
    {
        $title = AppDatabase::getAppAbbreviation();

        if ($app->route->getData() != '') {
            $title .= ' - ' . $app->route->getData();
        } else {
            if ($app->route->getControler() != '') {
                $controllerPath = explode("\\", $app->route->getControler());
                foreach ($controllerPath as $part) {
                    $title .= ' - ' . ucfirst($part);

                }
            }
            if ($app->route->getMethod() != 'index' && $app->route->getMethod() != 'indexGet' && $app->route->getMethod() != 'indexPost') {
                $title .= ' - ' . ucfirst($app->route->getMethod());
            }
        }
        return $title;
    }

    public function apply()
    {

        return parent::apply(); // TODO: Change the autogenerated stub

    }


}

?>