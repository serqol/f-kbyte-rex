<?php

namespace Source;

class Application {

    /**
     * @param array $dataSet
     * @param $offset
     * @param $limit
     * @return array
     */
    public function run(array $dataSet, $offset, $limit) {
        $result = [];
        $dataSetCount = $this->_getDataSetCount($dataSet);
        if ($offset > $dataSetCount) {
            return $result;
        }

        $currentCount = 0;
        foreach ($dataSet as $key => $data) {
            $dataCount = count($data);
            $currentCount += $dataCount;
            if ($currentCount > $offset) {
                $dataLeftCount = $currentCount - $offset;
                if ($dataLeftCount >= $limit) {
                    $result[$key] = [
                        'offset' => 0,
                        'limit'  => $limit,
                    ];
                    break;
                } else {
                    $result[$key] = [
                        'offset' => $dataCount - $dataLeftCount,
                        'limit'  => $dataLeftCount,
                    ];
                    $limit -= $dataLeftCount;
                }
            }
        }

        return $result;
    }

    private function _getDataSetCount($dataSet) {
        $count = 0;
        foreach ($dataSet as $data) {
            $count += count($data);
        }
        return $count;
    }
}