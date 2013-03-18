<?php return array (
  '1.4.2' => 
  array (
    'project' => 'fis_pc',
    'version' => '1.4.2',
    'name' => 'fis-pc-1.4.2',
    'data' => 
    array (
      'content' => 
      array (
        'funs' => 
        array (
          'title' => '升级的功能点',
          'data' => 
          array (
            0 => '1.在js中f.uri自己，编译时会死循环，导致cgi挂掉',
            1 => '2.后台,编译时会死循环',
          ),
        ),
        'result' => 
        array (
          'title' => '测试结论',
          'data' => 
          array (
            0 => 'bug都已修复',
          ),
        ),
        'effi' => 
        array (
          'title' => '效率数据',
          'data' => 
          array (
            0 => '由于bug 修复，延期了一天发布',
          ),
        ),
        'exp' => 
        array (
          'title' => '说明',
          'data' => 
          array (
            0 => '单侧覆盖率有所下降',
          ),
        ),
      ),
      'testdata' => 
      array (
        'bugs' => 
        array (
          0 => 
          array (
            'fun' => '1.在js中f.uri自己，编译时会死循环，导致cgi挂掉',
            'count' => 1,
            'qa' => 'QA:shenlixia01',
            'rd' => 'RD:yuanfang',
            'active' => 0,
          ),
          1 => 
          array (
            'fun' => '2.后台,编译时会死循环',
            'count' => 2,
            'qa' => 'QA:shenlixia01',
            'rd' => 'RD:lixiaopeng',
            'active' => 0,
          ),
        ),
        'diffs' => 
        array (
          'pic' => 
          array (
            0 => 
            array (
              'module' => 'common',
              'new' => 28510,
              'old' => 28145,
              'change' => 1.3,
            ),
            1 => 
            array (
              'module' => 'album',
              'new' => 11914,
              'old' => 11852,
              'change' => 0.52,
            ),
            2 => 
            array (
              'module' => 'favtoolbar',
              'new' => 11076,
              'old' => 11258,
              'change' => -1.62,
            ),
            3 => 
            array (
              'module' => 'home',
              'new' => 3176,
              'old' => 3247,
              'change' => -2.19,
            ),
            4 => 
            array (
              'module' => 'manage',
              'new' => 9669,
              'old' => 9583,
              'change' => 0.9,
            ),
            5 => 
            array (
              'module' => 'message',
              'new' => 12475,
              'old' => 12479,
              'change' => -0.03,
            ),
            6 => 
            array (
              'module' => 'picture',
              'new' => 27573,
              'old' => 28529,
              'change' => -3.35,
            ),
            7 => 
            array (
              'module' => 'tag',
              'new' => 5126,
              'old' => 5048,
              'change' => 1.55,
            ),
            8 => 
            array (
              'module' => 'thirduser',
              'new' => 11154,
              'old' => 11261,
              'change' => -0.95,
            ),
            9 => 
            array (
              'module' => 'timeline',
              'new' => 13210,
              'old' => 13312,
              'change' => -0.77,
            ),
            10 => 
            array (
              'module' => 'user',
              'new' => 12298,
              'old' => 12443,
              'change' => -1.17,
            ),
          ),
        ),
        'cov' => 
        array (
          'versions' => '["1.3.1","1.3.2","1.3.3","1.4.2","1.3.8"]',
          'covs' => '["67.3","65.2","68.3","57.3","57.3"]',
        ),
        'else' => 
        array (
          'isdiff' => '1',
          'diffResult' => 
          array (
            0 => '一切正常',
          ),
          'iscov' => '1',
          'covResult' => 
          array (
            0 => '一切正常',
          ),
          'is_CI_Sample' => '1',
          'CI_Sample' => 
          array (
            0 => '已经全部通过',
          ),
          'isCompile' => '1',
          'compile' => 
          array (
            0 => '在编译机上运行通过',
          ),
          'isCaseStatistic' => '1',
          'caseStatistic' => 
          array (
            0 => '新增系统case 10个，都已经通过',
            1 => '新增单测 10个，都已经通过',
          ),
          'isStartScript' => '1',
          'startScript' => 
          array (
            0 => '在windows和linux下运行正常',
          ),
        ),
      ),
    ),
  ),
);