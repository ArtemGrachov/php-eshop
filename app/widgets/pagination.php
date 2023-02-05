<?php
require_once(__DIR__ . '/../constants/pagination.php');

class WidgetPagination {
    public function __construct($totalItems = 0, $currentPage = 1, $itemsPerPage = null) {
        global $PAGINATION_LIMIT;

        $this->totalItems = $totalItems;
        $this->currentPage = $currentPage;
        $this->itemsPerPage = $itemsPerPage ?? $PAGINATION_LIMIT;
        $this->totalPages = ceil($totalItems / $this->itemsPerPage);
    }

    public function render() {
        $offset = 1;

        $showPagination = $this->totalPages > 1;
        $showPrevious = $this->currentPage > 1;
        $showNext = $this->currentPage < $this->totalPages;

        $currentPage = $this->currentPage;
        $lastPage = $this->totalPages;
        $prevPage = $this->currentPage - 1;
        $nextPage = $this->currentPage + 1;

        $showFirstPage = $this->currentPage > ($offset + 1);
        $showLastPage = $this->currentPage < ($this->totalPages - $offset + 1);

        $showEllipsisPrev = ($this->currentPage - ($offset + 1)) > 1;
        $showEllipsisNext = ($this->currentPage + ($offset + 1)) < $lastPage;

        $rangeStart = max($this->currentPage - $offset, 1);
        $rangeEnd = min($this->currentPage + $offset + 1, $this->totalPages);

        include(__DIR__ . '/../views/partials/pagination.php');
    }
}
