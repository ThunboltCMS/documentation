<?php

class ThunboltDocsLoader {

	public static function getFile(string $lang, string $file): string {
		return __DIR__ . '/../' . $lang . '/' . $file;
	}

	public static function getBasePath(): string {
		return __DIR__ . '/..';
	}

}
