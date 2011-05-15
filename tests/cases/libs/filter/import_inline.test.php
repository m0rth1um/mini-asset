<?php
App::import('Lib', 'AssetCompress.filter/ImportInline');

class ImportInlineTest extends CakeTestCase {
	function setUp() {
		$this->_pluginPath = App::pluginPath('AssetCompress');

		$this->filter = new ImportInline();
		$settings = array(
			'paths' => array(
				$this->_pluginPath . 'tests/test_files/css/'
			)
		);
		$this->filter->setup($settings);
	}

	function testReplacement() {
		$content = file_get_contents($this->_pluginPath . 'tests' . DS . 'test_files' . DS . 'css' . DS . 'nav.css');
		$result = $this->filter->input('nav.css', $content);
		$expected = <<<TEXT
* {
	margin:0;
	padding:0;
}
#nav {
	width:100%;
}
TEXT;
		$this->assertEqual($expected, $result);
	}
}