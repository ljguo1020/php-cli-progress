# php-cli-progress
php 命令行显示进度条

## 使用方法

```php
/**
 * array array | Iterator
 * label string
 * color red | black | green | blue | yellow
 */
$array = new Progress(range(1, 100), 'progress', 'green');

foreach($array as $i) {
    usleep(200000);
}
```
