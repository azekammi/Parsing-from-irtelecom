<?php
/**
 *  Jabrayil Alizada
 *  jabrayil.alizada@gmail.com
 *  Copyright (c) 2017.
 *
 *  Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is
 *  furnished to do so, subject to the following conditions:
 *
 *  The above copyright notice and this permission notice shall be included in all
 *  copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 *  SOFTWARE.
 */

require_once "DataInterface.php";

/**
 * Class Data
 */
class Data implements DataInterface {

    /**
     * @return array
     */
    public static function getCategories()
    {
        return array(
            "Telephones" => [
                ["Alcatel", "27"],
                ["Apple", "6"],
                ["Blackberry", "8"],
                ["HTC", "23"],
                ["Keneksi", "256"],
                ["Meizu", "354"],
                ["Philips", "353"],
                ["Samsung", "7"],
                ["Xiaomi", "95"]
            ],
            "Tablets" => [
                ["Alcatel", "34"],
                ["Samsung", "30"]
            ]
        );
    }


    /**
     * @param array $subCategory
     * Example: Alcatel 27
     * method will return SubCategory's label Alcatel
     * @return string
     */
    public static function getLabel($subCategory)
    {
        return $subCategory[0];
    }

    /**
     * @param array $subCategory
     * Example: Alcatel 27
     * method will return SubCategory's page number 27
     * @return string
     */
    public static function getPageNum($subCategory)
    {
        return $subCategory[1];
    }

}