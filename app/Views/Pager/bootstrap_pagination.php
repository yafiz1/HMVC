<?php
/**
 * @var \CodeIgniter\Pager\PagerRenderer $pager
 */
 
$pager->setSurroundCount(2);
?>
<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
    <ul class="pagination">
        <?php if ($pager->hasPrevious()) : ?>
            <li class="page-item">
                <a href="<?= $pager->getPrevious() ?>" class="page-link" aria-label="<?= lang('Pager.previous') ?>">
                    <span>«</span>
                </a>
            </li>
        <?php endif ?>
 
        <?php foreach ($pager->links() as $link) : ?>
            <?php 
                $pisah = explode("?",$link['uri']);
                $pisah2 = explode("/",$pisah[0]);
                $pisah2 = end($pisah2);
                $link['uri'] = base_url()."/perpustakaan/".$pisah2."?".$pisah[1];
            ?>
            <li <?= $link['active'] ? 'class="active page-item"' : 'class="page-item"' ?>>
                <a href="<?= $link['uri'] ?>" class="page-link">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>
 
        <?php if ($pager->hasNext()) : ?>
            <li class="page-item">
                <a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>" class="page-link">
                    <span aria-hidden="true">»</span>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>