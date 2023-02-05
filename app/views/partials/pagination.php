<?php
function generateLink($page) {
  $mergedQuery = array_merge($_GET, [ 'page' => $page ]);
  $strQuery = http_build_query($mergedQuery);
  return '?' . $strQuery;
}
?>

<?php if ($showPagination): ?>
  <nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">
    <?php if ($showPrevious): ?>
      <a
        class="pagination-previous"
        href="<?= generateLink($prevPage) ?>"
      >
        Previous
      </a>
    <?php endif; ?>
    <?php if ($showNext): ?>
      <a
        href="<?= generateLink($nextPage) ?>"
        class="pagination-next"
      >
        Next page
      </a>
    <?php endif; ?>
    <ul class="pagination-list">
      <?php if ($showFirstPage): ?>
        <li>
          <a
            href="<?= generateLink(1) ?>"
            class="pagination-link"
          >
            1
          </a>
        </li>
      <?php endif; ?>
      <?php if ($showEllipsisPrev): ?>
        <li><span class="pagination-ellipsis">&hellip;</span></li>
      <?php endif; ?>
      <?php for ($i = $rangeStart; $i < $currentPage; $i++) :?>
        <li>
          <a
            href="<?= generateLink($i) ?>"
            class="pagination-link"
          >
            <?= $i ?>
          </a>
        </li>
      <?php endfor;?>
      <li>
        <a class="pagination-link is-current">
          <?= $currentPage ?>
        </a>
      </li>
      <?php for ($i = $currentPage + 1; $i < $rangeEnd; $i++) :?>
        <li>
          <a
            href="<?= generateLink($i) ?>"
            class="pagination-link"
          >
            <?= $i ?>
          </a>
        </li>
      <?php endfor;?>
      <?php if ($showEllipsisNext): ?>
        <li><span class="pagination-ellipsis">&hellip;</span></li>
      <?php endif; ?>
      <?php if ($showLastPage): ?>
        <li>
          <a
            href="<?= generateLink($lastPage) ?>"
            class="pagination-link"
          >
            <?= $lastPage ?>
          </a>
        </li>
      <?php endif; ?>
    </ul>
  </nav>
<?php endif; ?>
