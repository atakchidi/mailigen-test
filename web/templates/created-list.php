<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>List</title>
        <base href="/">
        <link rel='shortcut icon' type='image/x-icon' href='./favicon.ico' />
        <link rel="stylesheet" type="text/css" href="./assets/css/fonts.css">
        <link rel="stylesheet" type="text/css" href="./assets/vendor/fancybox/source/jquery.fancybox.css">
        <link rel="stylesheet" type="text/css" href="./assets/css/common.css">
    </head>
    <body>
        <form class="FullscreenLayout" id="CrateNewListForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
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
                    <h1><?php echo !$isNew ? 'Edit' : 'Create new' ?> lists</h1>
                </div>
                <div class="FullscreenLayout-headerActions">
                    <a href="/list" role="button" class="Button Button--medium">Cancel</a>
                </div>
            </header>
            <div class="FullscreenLayout-body">
                <div class="FullscreenLayout-center">
                    <div class="Box">
                        <div class="BoxContent">
                            <div>
                                <div class="u-row">
                                    <div class="u-column">
                                        <label class="Form-group">
                                            <span class="Form-label">Campaign title<span class="Icon Icon-ic_info Tooltip" data-tooltip="Hi, I'm a Tooltip!"><svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="./assets/svg/symbols.svg#ic_info"></use></svg></span></span>
                                            <input type="text" class="FormText CreateList-publicName" name="title" value="<?php echo $formData['title']?>" data-validation="required">
                                        </label>

                                        <div class="Form-group">
                                            <label class="Form-label" for="public-title">Public list name <span class="Icon Icon-ic_info Tooltip" data-tooltip="Hi, I'm a Tooltip!"><svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="./assets/svg/symbols.svg#ic_info"></use></svg></span>
                                                <div class="u-groupRight">
                                                    <div class="Checkbox">
                                                        <label>
                                                            <input type="checkbox" <?php echo $formData['public_title'] ? '' : 'checked' ?> class="Checkbox-input CreateList-publicTitle" id="public-title-checkbox">
                                                            <span class="Checkbox-icon"><span></span></span>
                                                            <span class="Checkbox-label">Use list title as public</span>
                                                        </label>
                                                        <span class="Icon Icon-ic_info Tooltip" data-tooltip="Hi, I'm a Tooltip!"><svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="./assets/svg/symbols.svg#ic_info"></use></svg></span>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="text" id="public-title" class="FormText CreateList-publicText"  name="public_title" disabled="disabled" value="<?php echo $formData['public_title']?>" data-validation="required">
                                        </div>
                                        <div class="u-spaceTop">
                                            <label for="reminder" class="Form-label">Subscription permission reminder</label>
                                            <div class="FormTextareaOverlay">
                                                <span class="FormTextareaOverlay-value">
                                                    Your subscribers will see this information. <a href="#"> Where?</a>
                                                </span>
                                                <textarea name="reminder" id="reminder" data-validation="length" data-validation-length="min10" placeholder="Write a short reminder about how your subscribers got on your email list.Example: “You subscribed to our newsletter on www.examplepage.comor through our company Facebook page" formtextareaautoresize class="FormTextarea"><?php echo $formData['reminder']?></textarea>
                                            </div>
                                            <div class="Reminder u-spaceTopSmall">
                                                <span class="Reminder-heading">Example of a short permission reminder:</span><br/>
                                                    <p>'You subscribed to our newsletter on www.mailigen.com or through our company Facebook page'</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="u-column">
                                        <div class="Form-group">
                                            <label class="Form-label">Email me when... <span class="Icon Icon-ic_info Tooltip" data-tooltip="Hi, I'm a Tooltip!"><svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="./assets/svg/symbols.svg#ic_info"></use></svg></span></label>
                                            <div class="Checkbox">
                                                <label>
                                                    <input type="checkbox" class="Checkbox-input" <?php echo $formData['is_sub'] ? 'checked' : ''?> name="email_subscribe" value="true">
                                                    <span class="Checkbox-icon"><span></span></span>
                                                    <span class="Checkbox-label">People subscribe</span>
                                                </label>
                                            </div>
                                            <div class="Checkbox">
                                                <label>
                                                    <input type="checkbox" class="Checkbox-input" <?php echo $formData['is_unsub'] ? 'checked' : '' ?> name="email_unsubscribe" value="true">
                                                    <span class="Checkbox-icon"><span></span></span>
                                                    <span class="Checkbox-label">People unsubscribe</span>
                                                </label>
                                            </div>
                                            <div class="Checkbox">
                                                <label>
                                                    <input type="checkbox" class="Checkbox-input" <?php echo $formData['prefs_changed'] ? 'checked' : '' ?> name="email_preferences" value="true">
                                                    <span class="Checkbox-icon"><span></span></span>
                                                    <span class="Checkbox-label">people change preferences</span>
                                                </label>
                                            </div>
                                            <div class="InputFieldEditable u-spaceTop on-edit">
                                                <label class="Form-label">to:</label>
                                                <div class="InputFieldEditable-item">
                                                    <input class="FormText EmailInput" type="text" disabled="disabled" placeholder="john.doe@example.com" value="<?php echo $formData['email'] ?>" name="email">
                                                    <a href="" class="BoxHeader-actionsItem CreateListEmail-edit">
                                                        <span class="Icon">
                                                            <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="assets/svg/symbols.svg#ic_create"></use></svg>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php if (!$formData): ?>
                                                <label class="Form-label u-spaceTopSmall">
                                                    Default list fields are Email, First Name and Last Name
                                                </label>
                                                <p>
                                                    You can manage list fields after the list is created
                                                </p>
                                            <?php else: ?>
                                                <label class="Form-label u-spaceTopSmall">
                                                    Manage your contact list fields and merge tags
                                                </label>
                                                <p>
                                                    Merge tags will help you to personalize email campaigns and store information about your subscribers.
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="FullscreenLayout-footer">
                <div class="FullscreenLayout-footerRight">
                    <input type="submit" class="Button Button--medium" value="<?php echo !$isNew ? 'Edit' : 'Create'?>"/>
                </div>
            </footer>
        </form>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="./assets/js/svg4everybody.min.js"></script>
        <script src="./assets/js/materialize/materialize.js"></script>
        <script src="./assets/js/materialize/forms.js"></script>
        <script src="./assets/js/materialize/dropdown.js"></script>
        <script src="./assets/js/sly.min.js"></script>
        <script src="./assets/js/jquery.modal.min.js"></script>
        <script src="./assets/vendor/jquery-form-validator/jquery.form-validator.min.js"></script>
        <script src="./assets/vendor/jquery-elementresize/dist/jquery.elementresize.min.js"></script>
        <script src="./assets/vendor/fancybox/source/jquery.fancybox.pack.js"></script>
        <script>
            svg4everybody();
        </script>
        <script src="./assets/js/app.js"></script>
    </body>
</html>
