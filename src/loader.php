<?php

class ThunbolDocsLoader {

	public static function getFile(string $lang, string $file): string {
		return __DIR__ . '/' . $lang . '/' . $file;
	}

}
