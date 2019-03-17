<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>View List</title>
    <base href="/">
    <link rel='shortcut icon' type='image/x-icon' href='./favicon.ico' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/common.css">
</head>
<body>
<div class="FullscreenLayout">
    <header class="FullscreenLayout-header">
        <div class="FullscreenLayout-headerLogo">
            <a href="/">
                <span class="Icon Icon-ic_m">
                    <svg>
                       <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="./assets/svg/symbols.svg#ic_m"></use>
                    </svg>
                </span>
            </a>
        </div>
        <div class="FullscreenLayout-headerTitle">
            <h1>View lists</h1>
        </div>
    </header>
    <div class="FullscreenLayout-body">
        <div class="FullscreenLayout-center">
            <?php if (!empty($list)): ?>
                <table class="highlight responsive-table" style="font-size: 18px">
                    <thead>
                    <tr>
                        <?php foreach (array_keys($list[0]) as $header): ?>
                            <th><?php echo $header ?></th>
                        <?php endforeach; ?>
                        <th>Edit#</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($list as $item): ?>
                    <tr>
                        <?php foreach ($item as $value): ?>
                            <td><?php echo $value ?></td>
                        <?php endforeach; ?>
                        <td>
                            <a href="<?php echo "/edit/{$item['id']}"?>" class="Button Button--small">Edit</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <h2>List is currently empty</h2>
            <?php endif; ?>
        </div>
    </div>
    <footer class="FullscreenLayout-footer">
        <div class="FullscreenLayout-footerRight">
            <a href="/" class="Button Button--medium">Create new</a>
        </div>
    </footer>
</div>
</body>
</html>

