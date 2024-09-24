<link rel="stylesheet" href="/woocasino/css/appef20.css">
<style type="text/css">
    .info-value {
        color: grey;
    }

    .table__date {
        color: grey;
    }

    .table__game,
    .table__withdrawal,
    .table__wallet {
        color: grey;
    }

    .table__bet {
        color: grey;
    }

    .table__win {
        color: grey;
    }

    .table__deposit {
        color: grey;
    }

    .table__status {
        color: grey;
    }

    .table__num {
        color: grey;
    }
</style>

<header class="header">
    <div class="header__mob-container">
        <div class="header__logo">
            <a class="header__logo-link" scroll-up="" href="#"> <img class="header__logo-img" src="/woocasino/resources/images/logo.png" alt="EWAA.Bet"> </a>
        </div>
        <div class="header__mob-wrp">
            <button class="header__mob-btn button button-secondary button-small ng-scope" ng-click="openModal($event, '#my-account')"><?php echo app('translator')->get('app.my_profile'); ?></button>
            <a href="<?php echo e(route('frontend.auth.logout')); ?>"> <button class="header__mob-btn button button-secondary button-small ng-scope"><?php echo app('translator')->get('app.logout'); ?></button></a>
            <br>
            <a class="header__mobile-menu"> <span class="header__mobile-menu-icon"></span> <span class="header__mobile-menu-icon"></span> <span class="header__mobile-menu-icon"></span> </a>
        </div>
    </div>
    <div class="header__container">
        <div class="header__logo">
            <a class="header__logo-link" scroll-up="" href="#"> <img class="header__logo-img" src="/woocasino/resources/images/logo.png" alt="EWAA.Bet"> </a>
        </div>
        <div class="header__container-bg">
            <div class="header-auth ng-isolate-scope">
                <div class="header-auth__anon ng-scope">
                    <div class="header-auth__anon-status"> <img class="header-auth__w-img-img" src="/woocasino/resources/images/status/w1.svg" alt=""> </div>
                    <div><button class="statuses-panel_btn button button-primary ng-scope" ng-click="openModal($event, '#my-account')"><?php echo app('translator')->get('app.depositb'); ?></button></div>

                    <div> <span style=" font-size:26px;color:#ffbb39;" class="info-value balanceValue">$<?php echo e(number_format(auth()->user()->balance, 2, '.', '')); ?>

                            <?php echo e(isset($currency) ? $currency : 'USD'); ?></span></div>

                    <?php if(!isset(auth()->user()->username)): ?>
                        <div class="header-auth__anon-btn-wrp">
                            <button class="modal-btn button button-primary header-auth__reg-btn ng-scope" data-name="modal-register" ng-click="openModal($event, '#registration-confirm')"><?php echo app('translator')->get('app.register'); ?></button>
                            <button class="modal-btn button button-secondary header-auth__login-btn ng-scope" ng-click="openModal($event, '#login-modal')"><?php echo app('translator')->get('app.log_in'); ?></button>
                        </div>
                    <?php endif; ?>
                </div>
				<br><div style="width: 100%;"><input type="text" class="search" placeholder="Search Games" style="border-radius: 15px;width: 100%;background: #00030a;padding: 2px 15px;border-style: solid;"></div>
            </div>
            <nav class="header-menu ng-scope ng-isolate-scope" type="main-menu">
                <div class="header-menu__live">
                    <a class="header-menu__live-link" scroll-up="" href="<?php echo e(route('frontend.game.list.category', 'new')); ?>">
                        <span class="header-menu__live-icon icon-woo-menu-default icon-woo-top-games"></span> <span class="header-menu__live-text ng-scope"><?php echo app('translator')->get('app.new'); ?></span>
                    </a>
                    <a class="header-menu__live-link" scroll-up="" href="<?php echo e(route('frontend.game.list.category', 'hot')); ?>">
                        <span class="header-menu__live-icon icon-woo-menu-default icon-woo-lightning"></span> <span class="header-menu__live-text ng-scope"><?php echo app('translator')->get('app.hot_game'); ?></span>
                    </a>
                </div>
                <ul class="header-menu__list">
                    <?php if(settings('use_all_categories') || true): ?>
                        <li class="header-menu__item ng-scope">
                            <a class="header-menu__link header-menu__link--games <?php if($currentSliderNum != -1 && $currentSliderNum == 'all'): ?> header-menu__link--current <?php endif; ?>" scroll-up="" href="<?php echo e(route('frontend.game.list.category', 'all')); ?>"> <i class="header-menu__icon icon-woo-menu-default icon-woo-bgaming-slot-battle"></i> <span class="header-menu__text ng-binding"><?php echo app('translator')->get('app.all'); ?></span> </a>
                        </li>
                    <?php endif; ?>

                    <?php if($categories && count($categories)): ?>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="header-menu__item ng-scope">
                                <a class="header-menu__link header-menu__link--games <?php if($currentSliderNum != -1 && $currentSliderNum == $category->href): ?> header-menu__link--current <?php endif; ?>" scroll-up="" href="<?php echo e(route('frontend.game.list.category', $category->href)); ?>"> <i class="header-menu__icon icon-woo-menu-default icon-woo-bgaming-slot-battle"></i> <span class="header-menu__text ng-binding"><?php echo e($category->title); ?></span> </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</header>

<div class="modal" id="my-account" style="display: none;max-height: 100%;">
    <header class="modal__header">
        <p style="text-align:left; margin-left:15px;"> <img src="/frontend/Default/img/logo1.png"><?php echo e(settings('app_name')); ?> - Your Profile</p>

        <span ng-click="closeModal($event)" class="modal__icon icon icon_cancel js-close-popup"></span>
    </header>
    <div class="popup">
        <div class="popup__body">
            <a href="" class="popup__logo">

            </a>
            <div class="popup__menu">
                <div data-href="#profile" class="popup__link"><?php echo app('translator')->get('app.pyour_profile'); ?></div>
                <div data-href="#document" class="popup__link">Documents</div>
                <div data-href="#history" class="popup__link"><?php echo app('translator')->get('app.pyour_history'); ?></div>
                <div data-href="#balance" class="popup__link active"><?php echo app('translator')->get('app.pyour_deposit'); ?></div>
                <div data-href="#withdraw" class="popup__link"><?php echo app('translator')->get('app.pyour_withdraw'); ?></div>
            </div>
            <div class="popup__cont " id="div_profile">
                <h2><?php echo app('translator')->get('app.welcome_to_profile_page'); ?> <?php echo e(auth()->user()->username); ?></h2>
                <br><br>
                <form class="popup__form" method="post" action="<?php echo e(route('frontend.profile.update.details')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="profile" style="padding:20px;">
                        <div class="profile__field">
                            <div class="profile__field-name"><?php echo app('translator')->get('app.first_name'); ?></div>
                            <input type="text" class="profile__field-input" name="first_name" value="<?php echo e(auth()->user()->first_name); ?>">
                        </div>
                        <div class="profile__field">
                            <div class="profile__field-name"><?php echo app('translator')->get('app.last_name'); ?></div>
                            <input type="text" class="profile__field-input" name="last_name" value="<?php echo e(auth()->user()->last_name); ?>">
                        </div>
                        <div class="profile__field">
                            <div class="profile__field-name"><?php echo app('translator')->get('app.date_of_birth'); ?></div>
                            <input type="date" class="profile__field-input profile__field-input--date" name="birthday" value="<?php echo e(auth()->user()->birthday? auth()->user()->birthday->toDateString(): ''); ?>">
                        </div>
                        <div class="profile__field">
                            <div class="profile__field-name"><?php echo app('translator')->get('app.gender'); ?></div>
                            <select class="profile__field-input " name="gender">
                                <option value="" style="display: none;">-</option>
                                <option value="1" <?php echo e(auth()->user()->gender == 1 ? 'selected' : ''); ?>><?php echo app('translator')->get('app.male'); ?></option>
                                <option value="2" <?php echo e(auth()->user()->gender == 2 ? 'selected' : ''); ?>><?php echo app('translator')->get('app.female'); ?></option>
                            </select>
                        </div>
                        <div class="profile__field">
                            <div class="profile__field-name"><?php echo app('translator')->get('app.country'); ?></div>
                            <?php
                                $countries = [
                                    'gb' => 'UK',
                                    'de' => 'Germany',
                                    'it' => 'Italy',
                                    'fr' => 'France',
                                    'ka' => 'Georgia',
                                    'es' => 'Spain',
                                ];
                            ?>
                            <select class="profile__field-input" name="country">
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($k); ?>" <?php echo e(auth()->user()->country == $k ? 'selected' : ''); ?>><?php echo e($c); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </select>
                        </div>
                        <div class="profile__field">
                            <div class="profile__field-name"><?php echo app('translator')->get('app.lang'); ?></div>
                            <select class="profile__field-input " name="language">
                                <?php $__currentLoopData = $lang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($k); ?>" <?php echo e(auth()->user()->language == $k ? 'selected' : ''); ?>><?php echo e($v); ?></option>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="profile__field">
                            <div class="profile__field-name"><?php echo app('translator')->get('app.city'); ?></div>
                            <input type="text" class="profile__field-input" name="city" value="<?php echo e(auth()->user()->city); ?>">
                        </div>
                        <div class="profile__field">
                            <div class="profile__field-name"><?php echo app('translator')->get('app.address'); ?></div>
                            <input type="text" class="profile__field-input" name="user_address" value="<?php echo e(auth()->user()->user_address); ?>">
                        </div>
                        <div class="profile__field">
                            <div class="profile__field-name"><?php echo app('translator')->get('app.postcode'); ?></div>
                            <input type="text" class="profile__field-input" name="postcode" value="<?php echo e(auth()->user()->postcode); ?>">
                        </div>
                        <ul class="col-6 footer__item-acc-info" style="padding: 5px 0px;grid-column: 1/3;">
                            <?php echo app('translator')->get('app.current_balances'); ?>!
                            <li style="font-black"><span class="info-name"><?php echo app('translator')->get('app.your_balance'); ?>:</span> <span class="info-value balanceValue"><?php echo e(number_format(auth()->user()->balance, 2, '.', '')); ?>

                                    <?php echo e(isset($currency) ? $currency : 'USD'); ?></span></li>
                            <li class="font-black"><span class="info-name"><?php echo app('translator')->get('app.your_bonus'); ?>:</span> <span class="info-value bonusValue"><?php echo e(number_format(auth()->user()->bonus, 2, '.', '')); ?>

                                    <?php echo e(isset($currency) ? $currency : 'USD'); ?></span></li>
                            <li class="font-black"><span class="info-name"><?php echo app('translator')->get('app.your_wager'); ?>:</span> <span class="info-value wager"><?php echo e(number_format(auth()->user()->wager, 2, '.', '')); ?>

                                    <?php echo e(isset($currency) ? $currency : 'USD'); ?></span></li>
                            <!-- class disabled -->
                            <?php if(isset($refund) &&
                                $refund &&
                                auth()->user()->present()->count_refund > 0 &&
                                auth()->user()->present()->balance <= $refund->min_balance): ?>
                                <li class="font-black refunds-icon"><span class="info-name"><?php echo app('translator')->get('app.refunds'); ?>:</span>
                                    <span class="info-value count_refund" id="refunds"><?php echo e(number_format(auth()->user()->count_refund, 2, '.', '')); ?>

                                        <?php echo e(isset($currency) ? $currency : 'USD'); ?></span>
                                </li>
                            <?php else: ?>
                                <li class="font-black refunds-icon disabled">
                                    <span class="info-name"><?php echo app('translator')->get('app.refunds'); ?>:</span>
                                    <span class="info-value count_refund"><?php echo e(number_format(auth()->user()->count_refund, 2, '.', '')); ?>

                                        <?php echo e(isset($currency) ? $currency : 'USD'); ?></span>
                                </li>
                            <?php endif; ?>

                        </ul>
                    </div>
                    <button class="popup__btn" type="submit"><?php echo app('translator')->get('app.update'); ?></button>
                </form>
            </div>
            <div class="popup__cont " id="div_document">
                <?php
                    $disable = true;
                    $status = trans('app.Unconfirmed');
                    if (auth()->user()->is_approved_license == '1') {
                        $status = trans('app.activated');
                    } elseif (auth()->user()->is_approved_license == '-1') {
                        $status = trans('app.Banned');
                    }
                ?>
                <?php if(auth()->user()->is_approved_license != '1'): ?>
                    <div class="notification" style="position:relative; left:0; top:0; margin-inline:auto;">
                        <img src="/assets/icon_notification.png" class="notification__icon">
                        <p class="notification__text">
                            <?php
                                if (auth()->user()->update_license_at > 0) {
                                    if (auth()->user()->is_approved_license == 0) {
                                        echo 'Your Documents are waiting Approval please allow 48 hours.<br><b>' . date('Y/m/d H:i:s') . '</b>';
                                    } else {
                                        $disable = false;
                                        echo 'We are sorry but your documents were not approved.<br> Please try again with new documents.';
                                    }
                                } else {
                                    $disable = false;
                                    echo 'Please upload jpg format file' . ':';
                                }
                            ?>
                    </div>
                <?php elseif(auth()->user()->update_license_at > strtotime(auth()->user()->last_login)): ?>
                    <div class="notification">
                        <img src="/assets/icon_notification.png" class="notification__icon">
                        <p class="notification__text">
                            Thank you, your documents have been approved!
                    </div>
                <?php endif; ?>
                <?php if(!$disable): ?>
                    <form action="<?php echo e(route('frontend.document.post')); ?>" method="post" enctype="multipart/form-data" name="document-form">
                        <?php echo csrf_field(); ?>
                <?php endif; ?>
                <table class="table">
                    <thead>
                        <tr>
                            <td class="table__num">#</td>
                            <td class="table__name"><?php echo app('translator')->get('app.document_request_list'); ?></td>
                            <td class="table__files"><?php echo app('translator')->get('app.files'); ?></td>
                            <td class="table__status"><?php echo app('translator')->get('app.status'); ?></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="table__doc">
                                <div class="table__doc-name"><?php echo app('translator')->get('app.id_passport_driving_licence_front'); ?></div>
                                <div class="table__help table__help--front"></div>
                            </td>
                            <td class="table__add">
                                <div class="file">
                                    <input type="file" name="license_front" class="file__input" <?php echo e($disable ? 'disabled' : ''); ?> accept="image/*" required>
                                    <div class="table__add-btn"><?php echo app('translator')->get('app.upload_files'); ?></div>
                                </div>

                            </td>
                            <td style="padding:10px"><?php echo e($status); ?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td class="table__doc">
                                <div class="table__doc-name"><?php echo app('translator')->get('app.id_passport_driving_licence_back'); ?></div>
                                <div class="table__help table__help--back"></div>
                            </td>
                            <td class="table__add">
                                <div class="file">
                                    <input type="file" name="license_back" class="file__input" <?php echo e($disable ? 'disabled' : ''); ?> accept="image/*" required>
                                    <div class="table__add-btn"><?php echo app('translator')->get('app.upload_files'); ?></div>
                                </div>
                            </td>
                            <td style="padding:10px"><?php echo e($status); ?></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td class="table__doc">

                                <div class="table__doc-name"><?php echo app('translator')->get('app.utility_bill'); ?></div>
                                <div class="table__wrap">
                                    <div class="table__help table__help--front"></div>
                                    <div class="table__tooltip"><?php echo app('translator')->get('app.you_can_upload_doc_pdf_as_well'); ?>
                                    </div>
                                </div>
                            </td>
                            <td class="table__add">
                                <div class="file">
                                    <input type="file" name="bill_doc" class="file__input" <?php echo e($disable ? 'disabled' : ''); ?> accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/x-png,image/gif,image/jpeg" required>
                                    <div class="table__add-btn"><?php echo app('translator')->get('app.upload_files'); ?></div>
                                </div>
                            </td>
                            <td style="padding:10px"><?php echo e($status); ?></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <?php if(!$disable): ?>
                                    <input type="submit" value="Submit" class="popup__button button btn btng">
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php if(!$disable): ?>
                    <div style="display:flex; grid-template-columns: repeat(3, 1fr); min-height: 100px;gap: 20px">
                        <img id="license_front" src="" alt="" style="width: calc(100% / 3 - 20px);">
                        <img id="license_back" src="" alt="" style="width: calc(100% / 3 - 20px);">
                        <img id="bill_doc" src="" alt="" style="width: calc(100% / 3 - 20px);">
                    </div>
                    </form>
                <?php endif; ?>
            </div>
            <div class="popup__cont " id="div_history">
                <div class="history__filter" style="display: none;">
                    <form action="https://casino-sr.surge.sh/" class="history__form">
                        <div class="history__field">
                            <div class="history__field-name"><?php echo app('translator')->get('app.from_date'); ?>:</div>
                            <input type="text" class="history__field-input" maxlength="10">
                        </div>
                        <div class="history__field">
                            <div class="history__field-name"><?php echo app('translator')->get('app.to_date'); ?>:</div>
                            <input type="text" class="history__field-input" maxlength="10">
                        </div>
                        <button class="history__btn"><?php echo app('translator')->get('app.history_date'); ?></button>
                    </form>

                </div>

                <div class="history__box">
                    <div class="history__item">
                        <div class="history__name"><?php echo app('translator')->get('app.games_date'); ?></div>
                        <div class="history__cont">
                            <table class="table table--history">
                                <thead>
                                    <tr>
                                        <td class="table__num">#</td>
                                        <th class="table__date"><?php echo app('translator')->get('app.date'); ?></th>
                                        <th class="table__game"><?php echo app('translator')->get('app.game'); ?></th>
                                        <th class="table__bet"><?php echo app('translator')->get('app.bet'); ?></th>
                                        <th class="table__win"><?php echo app('translator')->get('app.win'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($gamestat) && count($gamestat)): ?>
                                        <?php $__currentLoopData = $gamestat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($k + 1); ?></td>
                                                
                                                <td><?php echo e($stat->date_time); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('frontend.game.go', $stat->game)); ?>?api_exit=/">
                                                        <?php echo e($stat->game); ?>

                                                    </a>
                                                </td>
                                                <td><?php echo e($stat->bet); ?></td>
                                                <td><?php echo e($stat->win); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6"><?php echo app('translator')->get('app.no_data'); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="history__item">
                        <div class="history__name"><?php echo app('translator')->get('app.deposits_date'); ?></div>
                        <div class="history__cont">
                            <table class="table table--history">
                                <thead>
                                    <tr>
                                        <td class="table__num">#</td>
                                        <td class="table__date"><?php echo app('translator')->get('app.date_date'); ?></td>
                                        <td class="table__game"><?php echo app('translator')->get('app.transaction_date'); ?></td>
                                        <td class="table__deposit"><?php echo app('translator')->get('app.deposits_date'); ?></td>
                                        <td class="table__status"><?php echo app('translator')->get('app.status_date'); ?></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($depositlist) && count($depositlist)): ?>
                                        <?php $__currentLoopData = $depositlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($k + 1); ?></td>
                                                
                                                <td><?php echo e($row->created_at); ?></td>
                                                <td><?php echo e($row->id); ?></td>
                                                <td><?php echo e($row->sum); ?> <?php echo e($row->currency); ?></td>
                                                <td><?php echo e($row->status); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6"><?php echo app('translator')->get('app.no_data'); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="history__item">
                        <div class="history__name"><?php echo app('translator')->get('app.withdrawals_date'); ?></div>
                        <div class="history__cont">
                            <table class="table table--history">
                                <thead>
                                    <tr>
                                        <td class="table__num">#</td>
                                        <td class="table__date"><?php echo app('translator')->get('app.date_date'); ?></td>
                                        <td class="table__game"><?php echo app('translator')->get('app.transaction_date'); ?></td>
                                        <td class="table__withdrawal"><?php echo app('translator')->get('app.withdrawals_date'); ?></td>
                                        <td class="table__wallet">wallet</td>
                                        <td class="table__status"><?php echo app('translator')->get('app.status_date'); ?></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($withdrawlist) && count($withdrawlist)): ?>
                                        <?php $__currentLoopData = $withdrawlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($k + 1); ?></td>
                                                
                                                <td><?php echo e($row->created_at); ?></td>
                                                <td><?php echo e($row->id); ?></td>
                                                <td><?php echo e($row->amount); ?> <?php echo e($row->currency); ?></td>
                                                <td><?php echo e($row->wallet); ?></td>
                                                <td><?php echo e((!$row->status ? 'Pending' : $row->status == 1) ? 'Approved' : 'Rejected'); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6"><?php echo app('translator')->get('app.no_data'); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            
                        </div>

                    </div>

                </div>
                <!-- <div class="popup__footer"><img src="/frontend/Default/img/bitcoin-casinos-bonus.png" style="margin-top:315px;" < /></div>

                <div class="popup__footer"><img src="/frontend/Default/img/modefooter/history.png" style="margin-top:400px;opacity: .9;" < /></div>-->
            </div>

            <div class="popup__cont active" id="div_balance">
                <!-- <div class="bonus">
                        <div class="bonus__inner">
                            <div class="bonus__title">Welcome bonus</div>
                            <div class="bonus__text">Double your funds and your fun with our outstanding welcome bonus! <br>
                                Following your first deposit, we will give you A MATCHING BONUS of 100% of the amount you
                                deposit, up to €200.</div>
                        </div>
                    </div>-->
                <div class="deposit">
                    <style>
                        .hotpay_inp {
                            width: 100% !important;
                            display: block;
                            text-align: center;
                            letter-spacing: 2px;
                            display: none;
                        }

                        .pay__header {
                            height: 40px;
                        }

                        .pay__title {
                            text-align: left;
                            font-size: 17px;
                            padding: 9px;
                            cursor: pointer;
                        }

                        .masterbutton {
                            margin: 0 !important;
                            margin-left: 13px !important;
                            margin-top: 9px !important;
                            width: 100%;
                            margin: 0 !important;
                        }

                        .masterbutton2 {
                            width: 100%;
                            margin: 0 !important
                        }

                        .tabs__content {
                            background: #fff;
                            display: none
                        }
                    </style>
                    <!-- <div class="deposit__item">
                            <div class="deposit__box">
                                <div class="deposit__name">Deposit by HotPay</div>
                                <div class="deposit__payments">
                                    <img src="/frontend/Default/img/visa.png" alt="" class="deposit__payments-img">
                                </div>
                            </div>
                            <div class="deposit__cont" style="overflow: hidden; display: none;">
                                <form name="valform" action="/hotpay.php" target="_blank" method="POST">
                                    <input type="hidden" name="uid" value="<?php echo e(auth()->user()->id); ?>">
                                    <input type="hidden" name="email" value="<?php echo e(auth()->user()->email); ?>">
                                    <div class="modal__content contentpay">
                                        <div class="deposit__inner">
                                            <center>
                                                <table style="display:block; width:300px; margin:0 auto;">
                                                    <tr>
                                                        <td colspan="2"> <input type="text" name="amount"
                                                                placeholder="Enter Amount"
                                                                class="modal__input-inner input__inner hotpay_inp"
                                                                style="font-weight:bold;" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"> <input type="text" name="card_no"
                                                                placeholder="Enter Card Number"
                                                                class="modal__input-inner input__inner hotpay_inp"
                                                                required></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="card_exp"
                                                                placeholder="Enter Ex.Date"
                                                                class="modal__input-inner input__inner hotpay_inp"
                                                                required></td>
                                                        <td><input type="text" name="card_cvv" placeholder="Enter CVV"
                                                                class="modal__input-inner input__inner hotpay_inp"
                                                                required></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><input type="text" name="card_holder"
                                                                placeholder="Enter CardHolder Name"
                                                                class="modal__input-inner input__inner hotpay_inp"
                                                                required></td>
                                                    </tr>
                                                </table>
                                            </center>
                                            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>
                                            <script type="text/javascript">
                                                jQuery(function($) {
                                                    $("input[name=card_no]").mask("9999 9999 9999 9999");
                                                    $("input[name=card_exp]").mask("99/99");
                                                    $("input[name=card_cvv]").mask("999");
                                                });
                                            </script>

                                        </div>
                                        <div class="modal__error" style="display: none"></div>
                                        <input type="submit" name="submit" value="Pay Now"
                                            class="popup__button button btn btng masterbutton2">
                                    </div>
                                </form>
                            </div>
                        </div> -->
                    <?php if(settings('payment_coinbase') && \VanguardLTE\Lib\Setting::is_available('coinbase', auth()->user()->shop_id)): ?>
                        <div class="deposit__item">
                            <div class="deposit__box">
                                <div class="deposit__name">Crypto Payment</div>
                                <div class="deposit__payments">
                                    <img src="/frontend/Default/img/visa.png" alt="" class="deposit__payments-img">
                                </div>
                            </div>
                            <div class="deposit__cont" style="overflow: hidden; display: none;">
                                <?php echo Form::open(['route' => 'frontend.balance.post', 'method' => 'POST']); ?>

                                <div class="modal__content contentpay">
                                    <div class="deposit__inner" style="grid-template-columns: 35% 55%;">
                                        <div class="input">
                                            <button style="min-width: 100%;" class="popup__button button">$USD Min $10 &gt;&gt;&gt;</button>
                                        </div>
                                        <div class="modal__input input">
                                            <input type="text" name="summ" class="modal__input-inner input__inner" placeholder="Enter Amount" required="" style="width:100%">
                                        </div>
                                    </div>
                                    <div class="input" style="display:grid">
                                        <input type="hidden" name="system" value="coinbase">
                                        <input type="submit" name="description" value="Deposit" class="popup__button button">
                                    </div>
                                </div>
                                <?php echo Form::close(); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(settings('payment_btcpayserver') && \VanguardLTE\Lib\Setting::is_available('btcpayserver', auth()->user()->shop_id)): ?>
                        ||
                        <div class="deposit__item">
                            <div class="deposit__box">
                                <div class="deposit__name"><?php echo app('translator')->get('app.btcpayserver'); ?></div>
                                <div class="deposit__payments">
                                    <!--<img src="/frontend/Default/img/visa.png" alt="" class="deposit__payments-img">-->
                                </div>
                            </div>
                            <div class="deposit__cont" style="overflow: hidden; display: none;">
                                <?php echo Form::open(['route' => 'frontend.balance.post', 'method' => 'POST']); ?>

                                <div class="modal__content contentpay">
                                    <div class="deposit__inner" style="grid-template-columns: 35% 55%;">
                                        <div class="input">
                                            <button style="min-width: 100%;" class="popup__button button">$USD Min $10 &gt;&gt;&gt;</button>
                                        </div>
                                        <div class="modal__input input">
                                            <input type="text" name="summ" class="modal__input-inner input__inner" placeholder="Enter Amount" required="" style="width:100%">
                                        </div>
                                    </div>
                                    <div class="input" style="display:grid">
                                        <input type="hidden" name="system" value="btcpayserver">
                                        <input type="submit" name="description" value="Deposit" class="popup__button button">
                                    </div>
                                </div>
                                <?php echo Form::close(); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(settings('payment_pin')): ?>
                        ||
                        <div class="deposit__item">
                            <div class="deposit__box">
                                <div class="deposit__name"><?php echo app('translator')->get('app.pincode'); ?></div>
                                <div class="deposit__payments">
                                    <img src="/frontend/Default/img/pincode.png" alt="" class="deposit__payments-img">
                                </div>
                            </div>
                            <div class="deposit__cont" style="overflow: hidden; display: none;">
                                <div class="modal__content contentpay">
                                    <div class="deposit__inner" style="grid-template-columns: 35% 55%;">
                                        <div class="input">
                                            <button style="min-width: 100%;" class="popup__button button">pin code &gt;&gt;&gt;</button>
                                        </div>
                                        <div class="modal__input input">
                                            <input type="text" name="summ" id="inputPin" class="modal__input-inner input__inner" placeholder="Enter Amount" required="" style="width:100%">
                                        </div>
                                    </div>
                                    <div class="input" style="display:grid">
                                        <input type="hidden" name="system" value="pincode">
                                        <input type="button" id="send" name="description" value="Deposit" class="popup__button button">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(settings('payment_metamask') && \VanguardLTE\Lib\Setting::is_available('metamask', auth()->user()->shop_id)): ?>
                        ||
                        <div class="deposit__item">
                            <a id="metamaskBtn">
                                <div class="deposit__box">
                                    <div class="deposit__name">Metamask</div>
                                    <div class="deposit__payments">
                                        
                                    </div>
                                </div>
                            </a>
                            <div class="deposit__cont" style="overflow: hidden; display: none;">
                                <div class="modal__content contentpay">
                                    <div class="deposit__inner" style="grid-template-columns: 35% 55%;">
                                        <div class="modal__input input">
                                            <select name="txtcurrency" id="metamaskCurrency" class="modal__input-inner input__inner" style="width: 200px;">
                                                <option value="busd">BUSD</option>
                                                <option value="usdt">USDT</option>
                                                <option value="usdc">USDC</option>
                                            </select>
                                        </div>
                                        <div class="modal__input input">
                                            <input type="text" name="summ" id="metamaskAmount" class="modal__input-inner input__inner" placeholder="Enter Amount" required="" style="width:100%">
                                        </div>
                                    </div>
                                    <div class="input" style="display:grid">
                                        <input type="hidden" name="system" value="metamask">
                                        <input type="button" name="description" id="metamaskSend" value="Deposit" class="popup__button button">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="deposit__item">
                        <div class="deposit__box">
                            <div class="deposit__name">Deposit crypto by Paykassa</div>
                            <div class="deposit__payments">
                                <img src="/frontend/Default/img/visa.png" alt="" class="deposit__payments-img">
                            </div>
                        </div>
                        <div class="deposit__cont" style="overflow: hidden; display: none;max-height:50vh;overflow:auto;">
                            <?php
                                $systems = [
                                    2 => ['key' => 'perfectmoney', 'currency' => ['USD']],
                                    7 => ['key' => 'berty', 'currency' => ['RUB', 'USD']],
                                    11 => ['key' => 'bitcoin', 'currency' => ['BTC']],
                                    12 => ['key' => 'ethereum', 'currency' => ['ETH']],
                                    14 => ['key' => 'litecoin', 'currency' => ['LTC']],
                                    15 => ['key' => 'dogecoin', 'currency' => ['DOGE']],
                                    16 => ['key' => 'dash', 'currency' => ['DASH']],
                                    18 => ['key' => 'bitcoincash', 'currency' => ['BCH']],
                                    19 => ['key' => 'zcash', 'currency' => ['ZEC']],
                                    22 => ['key' => 'ripple', 'currency' => ['XRP']],
                                    27 => ['key' => 'tron', 'currency' => ['TRX']],
                                    28 => ['key' => 'stellar', 'currency' => ['XLM']],
                                    29 => ['key' => 'binancecoin', 'currency' => ['BNB']],
                                    30 => ['key' => 'tron_trc20', 'currency' => ['USDT']],
                                    31 => ['key' => 'binancesmartchain_bep20', 'currency' => ['USDT', 'BUSD', 'USDC', 'ADA', 'EOS', 'BTC', 'ETH', 'DOGE']],
                                    32 => ['key' => 'ethereum_erc20', 'currency' => ['USDT']],
                                ];
                            ?>
                            <div class="modal__content">
                                <?php $__currentLoopData = $systems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo Form::open(['route' => 'frontend.balance.post', 'method' => 'POST']); ?>


                                    <div class="deposit__inner" style="grid-template-columns: 20% 20% 30% 20%;margin: 5px 0px;">
                                        <div class="modal__input input">
                                            <img src="/frontend/Default/img/_src/logo-<?php echo e($row['key']); ?>.png" class="modal__input-inner input__inner" alt="" style="max-width:100%;padding:0px;display:contents;">
                                        </div>
                                        <div class="modal__input input" style="margin-left:0px;padding-top:10px;">
                                            <?php if(count($row['currency']) == 1): ?>
                                                <?php echo Form::hidden('currency', $row['currency'][0]); ?>

                                                <input class="popup__button button btn btng masterbutton2" value="<?php echo e($row['currency'][0]); ?>" type="button" />
                                            <?php else: ?>
                                                <select name="currency" class="popup__button button btn btng masterbutton2" style="margin-top: 0px;min-width: 100%;">
                                                    <?php $__currentLoopData = $row['currency']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($c); ?>"><?php echo e($c); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            <?php endif; ?>
                                        </div>
                                        <div class="modal__input input" style="margin-left:0px;">
                                            <input type="number" class="modal__input-inner input__inner" step="0.01" placeholder="Enter Amount" name="summ" style="width:100%;height:40px;" required>
                                        </div>
                                        <div class="modal__input input" style="margin-left:0px;padding-top:10px;">
                                            <?php echo Form::hidden('system', $id); ?>

                                            <button class="popup__button button btn btng masterbutton2">Pay</button>
                                        </div>
                                    </div>
                                    <?php echo Form::close(); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>


                    <!--<div class="deposit__item">
                        <div class="deposit__box">
                            <div class="deposit__name"><?php echo app('translator')->get('app.deposit_by_zetpay'); ?></div>
                            <div class="deposit__payments">
                                <img src="/frontend/Default/img/visa.png" alt="" class="deposit__payments-img">
                            </div>
                        </div>
                        <div class="deposit__cont" style="overflow: hidden; display: none;">
                            <!--<form name="Pay" method="post" action="/send.php" accept-charset="UTF-8" class="modal__content">
                                    <div class="modal__input input2">
                                        <input type="text" name="amount" class="modal__input-inner input__inner"
                                            placeholder="Enter Amount" required style="width:100%">
                                    </div>
                                    <input type="hidden" name="currency" value="643">
                                    <input type="hidden" name="payway" value="card_eur">
                                    <input type="hidden" name="shop_id" value="133">
                                    <input type="hidden" name="shop_order_id" value="101">
                                    <input type="submit" type="hidden" name="description" value="Pay Balance"
                                        class="button masterbutton">
                                </form> 
                            <form name="Pay" method="post" action=" https://pay.zetpay.io/ru/pay" accept-charset="UTF-8" class="modal__content">
                                <div class="modal__input input2">
                                    <input type="text" name="amount" class="modal__input-inner input__inner" placeholder="Enter Amount" required style="width:100%">
                                </div>
                                <input type="hidden" name="currency" value="643" input type="hidden">
                                <input name="shop_id" value="133" type="hidden">
                                <input type="hidden" name="sign" value="7daaf7e7d574d3b259c367974b0cb244c8506140332bc65a814d7a917f7ce590">
                                <input type="hidden" name="shop_order_id" value="user_<?php echo e(auth()->user()->id); ?>">
                                <input type="submit" input type="hidden" name="description" value="Pay balance" class="button masterbutton">
                            </form>
                        </div>
                    </div>-->

                    <div class="deposit__item">
                        <div class="deposit__box">
                            <div class="deposit__name"><?php echo app('translator')->get('app.deposit_by_credit_card'); ?> (Stripe)</div>
                            <div class="deposit__payments">
                                <img src="/frontend/Default/img/visa.png" alt="" class="deposit__payments-img">
                            </div>
                        </div>
                        <div class="deposit__cont" style="overflow: hidden; display: none;">
                            <form name="stripe-form" action="<?php echo e(route('payment.creditcard.result')); ?>" method="POST">
                                <div class="modal__content contentpay">
                                    <?php echo csrf_field(); ?>
                                    <div class="deposit__inner">
                                        <div class="modal__input input">
                                            <input type="text" name="amount" placeholder="Enter Amount" class="modal__input-inner input__inner" required>
                                        </div>

                                        <div class="modal__input input">
                                            <select name="currency" class="modal__input-inner input__inner" style="width: 170px">
                                                <option value="eur">EUR</option>
                                                <option value="aud">AUD</option>
                                                <option value="bgn">BGN</option>
                                                <option value="brl">BRL</option>
                                                <option value="cad">CAD</option>
                                                <option value="chf">CHF</option>
                                                <option value="cny">CNY</option>
                                                <option value="czk">CZK</option>
                                                <option value="dkk">DKK</option>
                                                <option value="gbp">GBP</option>
                                                <option value="hkd">HKD</option>
                                                <option value="hrk">HRK</option>
                                                <option value="huf">HUF</option>
                                                <option value="idr">IDR</option>
                                                <option value="ils">ILS</option>
                                                <option value="inr">INR</option>
                                                <option value="isk">ISK</option>
                                                <option value="jpy">JPY</option>
                                                <option value="krw">KRW</option>
                                                <option value="mxn">MXN</option>
                                                <option value="myr">MYR</option>
                                                <option value="nok">NOK</option>
                                                <option value="nzd">NZD</option>
                                                <option value="php">PHP</option>
                                                <option value="pln">PLN</option>
                                                <option value="ron">RON</option>
                                                <option value="rub">RUB</option>
                                                <option value="sek">SEK</option>
                                                <option value="sgd">SGD</option>
                                                <option value="thb">THB</option>
                                                <option value="try">TRY</option>
                                                <option value="usd">USD</option>
                                            </select>
                                        </div>

                                        <div class="modal__input input">
                                            <input type="text" name="currency" class="modal__input-inner input__inner" readonly style="width: 170px" value="<?php echo e(auth()->user()->shop->currency); ?>" />
                                        </div>
                                    </div>
                                    <div class="modal__error" style="display: none"></div>
                                    <input type="submit" value="<?php echo app('translator')->get('app.verify_credit_card'); ?>" class="popup__button button btn btng masterbutton2">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="deposit__item active">
                        <div class="deposit__box">
                            <div class="deposit__name"><?php echo app('translator')->get('app.deposit_by_credit_card'); ?></div>
                            <div class="deposit__payments">
                                <img src="/frontend/Default/img/visa.png" alt="" class="deposit__payments-img">
                            </div>
                        </div>
                        <div class="deposit__cont" style="overflow: hidden; display: block;">
                            <form name="valform" action="" method="POST">
                                <div class="modal__content contentpay">
                                    <div class="deposit__inner">
                                        <div class="modal__input input">
                                            <input type="text" id="cctextboxid" name="cctextbox" placeholder="Enter Amount" class="modal__input-inner input__inner" required>
                                        </div>
                                        <div class="modal__input input">
                                            <select name="currency" id="currency" class="modal__input-inner input__inner" style="width: 170px">
                                                <option value="EUR">EUR</option>
                                                <option value="AUD">AUD</option>
                                                <option value="BGN">BGN</option>
                                                <option value="BRL">BRL</option>
                                                <option value="CAD">CAD</option>
                                                <option value="CHF">CHF</option>
                                                <option value="CNY">CNY</option>
                                                <option value="CZK">CZK</option>
                                                <option value="DKK">DKK</option>
                                                <option value="GBP">GBP</option>
                                                <option value="HKD">HKD</option>
                                                <option value="HRK">HRK</option>
                                                <option value="HUF">HUF</option>
                                                <option value="IDR">IDR</option>
                                                <option value="ILS">ILS</option>
                                                <option value="INR">INR</option>
                                                <option value="ISK">ISK</option>
                                                <option value="JPY">JPY</option>
                                                <option value="KRW">KRW</option>
                                                <option value="MXN">MXN</option>
                                                <option value="MYR">MYR</option>
                                                <option value="NOK">NOK</option>
                                                <option value="NZD">NZD</option>
                                                <option value="PHP">PHP</option>
                                                <option value="PLN">PLN</option>
                                                <option value="RON">RON</option>
                                                <option value="RUB">RUB</option>
                                                <option value="SEK">SEK</option>
                                                <option value="SGD">SGD</option>
                                                <option value="THB">THB</option>
                                                <option value="TRY">TRY</option>
                                                <option value="USD">USD</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal__error" style="display: none"></div>
                                    <input id="elem" type="button" name="submit" value="<?php echo app('translator')->get('app.verify_credit_card'); ?>" class="popup__button button btn btng masterbutton2">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--<div class="popup__footer"><img src="/frontend/Default/img/bitcoin-casinos-bonus.png" style="margin-top:345px;" < /></div>

                <div class="popup__footer"><img src="/frontend/Default/img/modefooter/deppage.png" style="margin-top:432px;opacity: .9;" < /></div>-->
            </div>
            <div class="popup__cont" id="div_withdraw">
                <p style="color: #ff0000;font-size: 16px;font-weight:normal;"><img src="/assets/icons8-support-60.png" style="float: left;position: relative;top: -13px;margin-right: 12px;}" />..</p>
                <br><br>
                <header class="modal__header">
                    <div class="span modal__title"><?php echo app('translator')->get('app.money_date'); ?></div>
                </header>
                <?php echo Form::open(['route' => 'frontend.profile.withdraw', 'method' => 'POST']); ?>

                <div class="modal__content">

                    <div class="deposit__inner">
                        <div class="modal__input input">
                            <input type="text" name="txtamount" placeholder="Enter Amount" class="modal__input-inner input__inner" style="">
                        </div>
                        <div class="modal__input input">
                            <select name="txtcurrency" class="modal__input-inner input__inner" style="width: 200px;">
                                <!--<option value="EUR">USD</option>-->
                                <option value="USD">USD</option>
                            </select>
                        </div>
                    </div>
                    <div style="display: grid;grid-template-columns: 1fr;">
                        <div class="modal__input input">
                            <input type="text" name="wallet" placeholder="Enter your Bitcoin wallet address" class="modal__input-inner input__inner" style="width: 100%; text-align: center;" required>
                        </div>
                    </div>
                </div>

                <div class="popup__footer">
                    <input type="submit" name="submit" value="<?php echo app('translator')->get('app.save'); ?>" class="popup__button button btn btng">
                </div>
                <div class="popup__warn" style="font-size:16px; align:center; ">***<?php echo app('translator')->get('app.min_notice_date'); ?></div>
                <div class="info-value"><span><?php echo app('translator')->get('app.pyour_balance'); ?>:</span> <span><?php echo e(number_format(auth()->user()->balance, 2, '.', '')); ?>

                        <?php echo e(isset($currency) ? $currency : 'USD'); ?></span></div>
                <?php echo Form::close(); ?>

                <img src="/frontend/Default/img/modefooter/withdraw.png" />
            </div>
        </div>
    </div>
</div>
<div class="modal" id="my-account-old" style="display: none;">

    <div class="row">
        <div class="game__cat__header">
            <div class="container1 games-wrap1">
                <div class="grid">
                    <div class="col-1-8 ">
                        <div class="game__category pay_modal balance game-cat-active" data-href="#balance">
                            <div class="game_category__content">
                                <h1><?php echo app('translator')->get('app.topup_date'); ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-1-8 ">
                        <div class="game__category pay_modal withdraw" data-href="#withdraw">
                            <div class="game_category__content">
                                <h1><?php echo app('translator')->get('app.withdraw_date'); ?></h1>
                            </div>
                        </div>
                    </div>
                    <span ng-click="closeModal($event)" class="modal__icon icon icon_cancel js-close-popup close-popup"></span>
                </div>
            </div>
        </div>
    </div>
    <script>
        (function($) {
            $(function() {

                $('.paymaster .pay__title').click(function() {
                    if ($(".contentmaster").hasClass("active")) {
                        $('.contentmaster').removeClass('active');
                    } else {
                        $('.contentmaster').removeClass('active');
                        $('.contentmaster').addClass('active');
                    }
                });

                $('.payvisa .pay__title').click(function() {
                    if ($(".contentpay").hasClass("active")) {
                        $('.contentpay').removeClass('active');
                    } else {
                        $('.contentpay').removeClass('active');
                        $('.contentpay').addClass('active');
                    }
                });

            });
        })(jQuery);
    </script>
    <style>
        .pay__header {
            height: 40px;
        }

        .pay__title {
            text-align: left;
            font-size: 17px;
            padding: 9px;
            cursor: pointer;
        }

        .masterbutton {
            margin: 0 !important;
            margin-left: 13px !important;
            margin-top: 9px !important;
            width: 100%;
            margin: 0 !important;
        }

        .masterbutton2 {
            width: 100%;
            margin: 0 !important
        }

        .tabs__content {
            background: #fff;
            display: none
        }
    </style>
    <div id="div_balance">
        <header class="modal__header">
            <div class="span modal__title"><?php echo app('translator')->get('app.addbalance_date'); ?></div>
            
        </header>
        <header class="modal__header pay__header paymaster">
            <div class="span modal__title pay__title">MasterCard</div>
            
        </header>
        <div class="tabs">
            <div class="modal__content tabs__content contentmaster">
                <form name="Pay" method="post" action="/send.php" accept-charset="UTF-8">
                    <div class="modal__input input2">
                        <input type="text" name="amount" class="modal__input-inner input__inner" placeholder="Enter Amount" required style="width:100%">
                    </div>
                    <input type="hidden" name="currency" value="978">
                    <input type="hidden" name="payway" value="card_eur">
                    <input type="hidden" name="shop_id" value="133">
                    <input type="hidden" name="shop_order_id" value="user_<?php echo e(auth()->user()->id); ?>">
                    <input type="submit" type="hidden" name="description" value="Verify Credit Card" class="button masterbutton">
                </form>
            </div>
            <header class="modal__header pay__header payvisa">
                <div class="span modal__title pay__title">Visa</div>
                
            </header>
            <form name="valform" action="" method="POST">
                <div class="modal__content tabs__content contentpay">

                    <div class="row">

                        <div class="modal__input input">

                            <input type="text" id="cctextboxid" name="cctextbox" placeholder="Enter Amount" class="modal__input-inner input__inner" required>
                        </div>
                        <div class="modal__input input">
                            <select name="currency" id="currency" class="modal__input-inner input__inner">
                                <option value="EUR">EUR</option>
                                <option value="AUD">AUD</option>
                                <option value="BGN">BGN</option>
                                <option value="BRL">BRL</option>
                                <option value="CAD">CAD</option>
                                <option value="CHF">CHF</option>
                                <option value="CNY">CNY</option>
                                <option value="CZK">CZK</option>
                                <option value="DKK">DKK</option>
                                <option value="GBP">GBP</option>
                                <option value="HKD">HKD</option>
                                <option value="HRK">HRK</option>
                                <option value="HUF">HUF</option>
                                <option value="IDR">IDR</option>
                                <option value="ILS">ILS</option>
                                <option value="INR">INR</option>
                                <option value="ISK">ISK</option>
                                <option value="JPY">JPY</option>
                                <option value="KRW">KRW</option>
                                <option value="MXN">MXN</option>
                                <option value="MYR">MYR</option>
                                <option value="NOK">NOK</option>
                                <option value="NZD">NZD</option>
                                <option value="PHP">PHP</option>
                                <option value="PLN">PLN</option>
                                <option value="RON">RON</option>
                                <option value="RUB">RUB</option>
                                <option value="SEK">SEK</option>
                                <option value="SGD">SGD</option>
                                <option value="THB">THB</option>
                                <option value="TRY">TRY</option>
                                <option value="USD">USD</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal__error" style="display: none"></div>
                    <input id="elem" type="button" name="submit" value="<?php echo app('translator')->get('app.verify_credit_card'); ?>" class="popup__button button btn btng masterbutton2">
                </div>
                <div class="popup__footer">

                </div>
            </form>
        </div>
    </div>
    <div id="div_withdraw" style="display: none">
        <header class="modal__header">
            <div class="span modal__title"><?php echo app('translator')->get('app.money_date'); ?></div>
        </header>

        <form name="valform1" action="<?php echo e(route('frontend.profile.withdraw')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="modal__content">

                <div class="row">
                    <div class="modal__input input">
                        <input type="text" name="txtamount" placeholder="Enter Amount" class="modal__input-inner input__inner" style="background-color: rgba(255, 255, 255, 0.3);color:#a5a3bd">
                    </div>
                    <div class="modal__input input">
                        <select name="txtcurrency" class="modal__input-inner input__inner" style="background-color: rgba(255, 255, 255, 0.3);">
                            <option value="USD">USD</option>
                            <!--<option value="EUR">EUR</option>-->
                        </select>
                    </div>
                </div>
            </div>
            <div class="popup__footer">
                <input type="submit" name="submit" value="<?php echo app('translator')->get('app.save'); ?>" class="popup__button button btn btng">
            </div>
        </form>
    </div>
    <div class="modal-preloader" style="display:none"></div>
</div>

<div class="modal" id="my-profile" style="display: none;">
    <header class="modal__header">
        <div class="span modal__title"><?php echo app('translator')->get('app.my_profile'); ?></div>
        <span ng-click="closeModal($event)" class="modal__icon icon icon_cancel js-close-popup"></span>
    </header>
    <div class="modal__body">
        <div class="modal__content">
            <p class="text-center" style="
                    text-align: center;
                    font-size: calc(0.90vw + 1rem);
                    color: white;
                ">Welcome <?php echo e(auth()->user()->username); ?></p>
            <p data-nsfw-filter-status="swf" style="text-align: center;">
                <img src="/frontend/Default/img/user1.png" data-nsfw-filter-status="sfw" style="visibility: visible;">
            </p>
            <p class="text-center" style="text-align: center;font-size: calc(0.90vw + 0.3rem);color: white;"><?php echo app('translator')->get('app.current_statts_date'); ?></p>
            <hr>
            <br>
            <div class="modal__table" style="width: 100%; height: auto;">
                <div>
                    <ul class="col-6 footer__item-acc-info" style="padding: 5px 0px;">
                        <li class="font-white"><span class="info-name"><?php echo app('translator')->get('app.pyour_balance'); ?>:</span> <span class="info-value balanceValue"><?php echo e(number_format(auth()->user()->balance, 2, '.', '')); ?>

                                <?php echo e(isset($currency) ? $currency : 'USD'); ?></span></li>
                        <li class="font-white"><span class="info-name"><?php echo app('translator')->get('app.pyour_bonus'); ?>:</span> <span class="info-value bonusValue"><?php echo e(number_format(auth()->user()->bonus, 2, '.', '')); ?>

                                <?php echo e(isset($currency) ? $currency : 'USD'); ?></span></li>
                        <li class="font-white"><span class="info-name"><?php echo app('translator')->get('app.pyour_wager'); ?>:</span> <span class="info-value wager"><?php echo e(number_format(auth()->user()->wager, 2, '.', '')); ?>

                                <?php echo e(isset($currency) ? $currency : 'USD'); ?></span></li>
                        <!-- class disabled -->
                        <?php if(isset($refund) &&
                            $refund &&
                            auth()->user()->present()->count_refund > 0 &&
                            auth()->user()->present()->balance <= $refund->min_balance): ?>
                            <li class="font-white refunds-icon"><span class="info-name"><?php echo app('translator')->get('app.pyour_refunds'); ?>:</span>
                                <span class="info-value count_refund" id="refunds"><?php echo e(number_format(auth()->user()->count_refund, 2, '.', '')); ?>

                                    <?php echo e(isset($currency) ? $currency : 'USD'); ?></span>
                            </li>
                        <?php else: ?>
                            <li class="font-white refunds-icon disabled">
                                <span class="info-name">Refunds:</span>
                                <span class="info-value count_refund"><?php echo e(number_format(auth()->user()->count_refund, 2, '.', '')); ?>

                                    <?php echo e(isset($currency) ? $currency : 'USD'); ?></span>
                            </li>
                        <?php endif; ?>

                    </ul>
                    <div class="col-6" style="padding: 30px;"><img src="/frontend/Default/img/casino1.jpg" style="visibility: visible; width: 50%;float: right;"></div>
                </div>
            </div>
            <div class="modal__error" style="display: none"></div>
        </div>
        <div class="modal-preloader" style="display:none"></div>
    </div>
</div>
<script type="text/javascript" src="/woocasino/js/web3.min.js"></script>
<script>
    var elem = document.getElementById('elem');
    elem.onclick = function() {

        var currency_val = $("#currency").val();

        fetch('https://api.cards2cards.com/v2/payment-pages', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    key: 'pk_live_4eHDu3NcsQ3XEG3bvWfLW6epJnsR5HgcwwERaER7mMmnj4MhiPfR1bJ1',
                    items: [{
                        name: 'Payment',
                        description: 'Optional description',
                        images: ['https://example.com/t-shirt.jpg'],
                        amount: (document.getElementById('cctextboxid').value * 100),
                        currency: currency_val,
                    }],
                    success_url: 'https://fidelitycasino.games/?success=true',
                    cancel_url: 'https://fidelitycasino.games/?cancel=true',
                    metadata: {
                        userId: "<?php echo e(auth()->user()->id); ?>",
                    },
                }),
            })
            .then(res => res.json())
            .then(res => window.location = res.data.url)
    };

    async function initMetamask() {
        const {
            ethereum
        } = window;
        if (Boolean(ethereum && ethereum.isMetaMask)) {
            if (!ethereum.selectedAddress) {
                try {
                    await ethereum.request({
                        method: 'eth_requestAccounts'
                    });
                    const accounts = await ethereum.request({
                        method: 'eth_accounts'
                    });
                    if (accounts[0]) {
                        // console.log('hard stress')
                        window.web3 = new Web3(ethereum);
                    } else {
                        swal({
                            title: "Not able to get accounts",
                            icon: "warning",
                        });
                    }
                } catch (error) {
                    console.error(error);
                    swal({
                        title: 'Please check your Metamask',
                        icon: "warning",
                    });
                }
            }
        } else {
            swal({
                title: 'Please install Metamask',
                icon: "warning",
            });
        }
    }

    $('#metamaskBtn').on('click', async () => {
        initMetamask();
    });

    let contractAddresses = {
        busd: '0xe9e7CEA3DedcA5984780Bafc599bD69ADd087D56',
        usdt: '0x55d398326f99059fF775485246999027B3197955',
        usdc: '0x8AC76a51cc950d9822D68b83fE1Ad97B32Cd580d'
    }
    //  let contractAddresses = {
    //   busd:'0x78867BbEeF44f2326bF8DDd1941a4439382EF2A7',
    //   usdt:'0x337610d27c682E347C9cD60BD4b3b107C9d34dDd',
    //     usdc:'0x64544969ed7EBf5f083679233325356EbE738930'
    // }

    $('#metamaskSend').on('click', async () => {
        if (ethereum && ethereum.selectedAddress) {
            if (!window.web3.eth) {
                window.web3 = new Web3(ethereum);
            }
            const chainId = "0x38";
            //         const chainId = "0x61";
            if (ethereum.chainId !== chainId) {
                try {
                    let result = await window.ethereum.request({
                        method: 'wallet_switchEthereumChain',
                        params: [{
                            chainId
                        }]
                    });
                    // console.log(result)
                } catch (e) {
                    console.error(e)
                    return;
                }
            }

            let amount = Number($("#metamaskAmount").val()).toFixed(3);
            // console.log(amount)

            if (amount < 0.01) {
                swal({
                    title: 'Too small amount!',
                    icon: "warning",
                });
            }
            let currency = $("#metamaskCurrency").val();
            const from = ethereum.selectedAddress;
            const to = "<?php echo e(\VanguardLTE\Lib\Setting::get_value('metamask', 'wallet_address', auth()->user()->shop_id)); ?>";
            const decimal = 18;
            const str15 = "000000000000000";

            let contractAddress = contractAddresses[currency];
            // let contractAddress = "0x9Ac64Cc6e4415144C455BD8E4837Fea55603e5c3";
            const contractAbi = getERC20ABI();
            // console.log(contractAbi,currency,amount, contractAddress, from)
            let contract = new web3.eth.Contract(contractAbi, contractAddress, {
                from
            })
            // console.log({contract})
            // let currentAmount = await contract.methods.balanceOf(from).call();
            // console.log(currentAmount);
            try {
                amount = amount * 1000 + str15;
                // console.log(amount)
                let trxHash = await contract.methods.transfer(to, amount).send({
                    from
                });
                // console.log(trxHash);
                $.ajax({
                    url: "<?php echo e(route('frontend.profile.metamask')); ?>",
                    type: "get",
                    data: {
                        hash: trxHash.transactionHash,
                        currency: currency
                    },
                    // data: {hash : "0x43cd09594601729c98823841046c6e5540d9abab0e5cdb7b78a5c915bd02e9ef"},
                }).then(function(res) {
                    console.log(res);
                    let data = JSON.parse(res);
                    if (data.fail) {
                        swal({
                            title: data.error,
                            icon: "warning",
                        });
                    } else if (data.success) {
                        swal({
                            title: 'Deposit was successful!',
                            icon: "success",
                        });
                        // setTimeout(()=>{
                        //     window.location.reload();
                        // }, 3000)
                        $('.balanceValue').text(Number(data.balance).toFixed(2) + ' <?php echo e(isset($currency) ? $currency : 'USD'); ?>');
                    }
                }).catch(function(err) {
                    console.log(err)
                    swal({
                        title: 'Sorry, something went wrong!',
                        icon: "warning",
                    });
                });
            } catch (e) {
                console.error(e);
                swal({
                    title: 'Transaction failed!',
                    icon: "warning",
                });
            }
        } else {
            initMetamask();
        }
    });

    $('body').on('click', '#send', function(event) {
        var pincode = $('#inputPin').val();
        $.ajax({
            url: "<?php echo e(route('frontend.profile.pincode')); ?>",
            type: "GET",
            data: {
                pincode: pincode
            },
            dataType: "json",
            success: function(data) {
                if (data.fail) {
                    swal({
                        title: data.error,
                        icon: "warning",
                    });
                }
                if (data.success) {
                    window.location.reload();
                }
            }
        });
    });

    $(".pay_modal").click(function() {
        var pay_modal = $(this).attr('data-href');
        if (pay_modal == "#balance") {
            $("#div_balance").css('display', 'block');
            $("#div_withdraw").css('display', 'none');
        } else {
            $("#div_withdraw").css('display', 'block');
            $("#div_balance").css('display', 'none');
        }
        $(".pay_modal").removeClass('game-cat-active');
        $(this).addClass('game-cat-active');
    });
    $('.popup__menu').on('click', '.popup__link:not(.active)', function(event) {
        event.preventDefault();
        $(this)
            .addClass('active').siblings().removeClass('active')
            .closest('.popup__body').find('.popup__cont').removeClass('active')
            .eq($(this).index()).addClass('active');
    });

    $('.deposit__box').click(function() {
        $(this).closest('.deposit__item').find('.deposit__cont').slideToggle();
        $(this).closest('.deposit__item').toggleClass('active');
        $(this).parent().siblings('.deposit__item').removeClass('active');
        $(this).parent().siblings().children().next().slideUp();
    });
    $('#withdra_form').submit(function() {
        //         alert('Thank you for the withdraw request can you please contact support via the live chat');
    });
    $('.history__name').click(function() {
        $(this).closest('.history__item').find('.history__cont').slideToggle();
        $(this).closest('.history__item').toggleClass('active');
        $(this).parent().siblings('.history__item').removeClass('active');
        $(this).parent().siblings().children().next().slideUp();
    });
    $(function() {
        try {
            $('.table--history').eq(0).dataTable({
                "autoWidth": false,
                "columns": [{
                    "width": "10%"
                }, {
                    "width": "25%"
                }, {
                    "width": "25%"
                }, {
                    "width": "20%"
                }, {
                    "width": "20%"
                }],
                "language": {
                    "paginate": {
                        "previous": "Prev"
                    }
                }
            });
        } catch (e) {}
        try {
            $('.table--history').eq(1).dataTable();
        } catch (e) {}
    })
    $('.button-my-profile').click(function() {
        $('.popup__link').eq(0).click()
    });
    $('.button-pay').click(function() {
        $('.popup__link').eq(2).click()
    });

    function getERC20ABI() {
        return [{
                "constant": true,
                "inputs": [],
                "name": "name",
                "outputs": [{
                    "name": "",
                    "type": "string"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            },
            {
                "constant": false,
                "inputs": [{
                        "name": "_spender",
                        "type": "address"
                    },
                    {
                        "name": "_value",
                        "type": "uint256"
                    }
                ],
                "name": "approve",
                "outputs": [{
                    "name": "",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            },
            {
                "constant": true,
                "inputs": [],
                "name": "totalSupply",
                "outputs": [{
                    "name": "",
                    "type": "uint256"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            },
            {
                "constant": false,
                "inputs": [{
                        "name": "_from",
                        "type": "address"
                    },
                    {
                        "name": "_to",
                        "type": "address"
                    },
                    {
                        "name": "_value",
                        "type": "uint256"
                    }
                ],
                "name": "transferFrom",
                "outputs": [{
                    "name": "",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            },
            {
                "constant": true,
                "inputs": [],
                "name": "decimals",
                "outputs": [{
                    "name": "",
                    "type": "uint8"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            },
            {
                "constant": true,
                "inputs": [{
                    "name": "_owner",
                    "type": "address"
                }],
                "name": "balanceOf",
                "outputs": [{
                    "name": "balance",
                    "type": "uint256"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            },
            {
                "constant": true,
                "inputs": [],
                "name": "symbol",
                "outputs": [{
                    "name": "",
                    "type": "string"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            },
            {
                "constant": false,
                "inputs": [{
                        "name": "_to",
                        "type": "address"
                    },
                    {
                        "name": "_value",
                        "type": "uint256"
                    }
                ],
                "name": "transfer",
                "outputs": [{
                    "name": "",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            },
            {
                "constant": true,
                "inputs": [{
                        "name": "_owner",
                        "type": "address"
                    },
                    {
                        "name": "_spender",
                        "type": "address"
                    }
                ],
                "name": "allowance",
                "outputs": [{
                    "name": "",
                    "type": "uint256"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            },
            {
                "payable": true,
                "stateMutability": "payable",
                "type": "fallback"
            },
            {
                "anonymous": false,
                "inputs": [{
                        "indexed": true,
                        "name": "owner",
                        "type": "address"
                    },
                    {
                        "indexed": true,
                        "name": "spender",
                        "type": "address"
                    },
                    {
                        "indexed": false,
                        "name": "value",
                        "type": "uint256"
                    }
                ],
                "name": "Approval",
                "type": "event"
            },
            {
                "anonymous": false,
                "inputs": [{
                        "indexed": true,
                        "name": "from",
                        "type": "address"
                    },
                    {
                        "indexed": true,
                        "name": "to",
                        "type": "address"
                    },
                    {
                        "indexed": false,
                        "name": "value",
                        "type": "uint256"
                    }
                ],
                "name": "Transfer",
                "type": "event"
            }
        ];
    }
</script>
<?php /**PATH /var/www/casino/resources/views/frontend/Default/partials/header_logged.blade.php ENDPATH**/ ?>