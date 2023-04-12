<?php
/*
	@source https://github.com/RubikIdeaCom/RubikIdeaComPagination Simple Calculator by PHP using NO Session or Cookie or DB
	@version 1.0.0
	@author RubikIdea.com (Ali Seyedabadi) <info@rubikidea.com>
	@link https://www.linkedin.com/in/ali-seyedabadi/
	@link http://rubikidea.com/
	@copyright 2009 rubikidea.com
	@license MIT
*/
namespace RubikIdeaCom {
    class Pagination {
        
        public $rowsCount = 0;
        
        public $pageNumbersPerPage = 0;
        public $rowsPerPage = 0;
        
        public $currentPage = 0;
        public $fromRow = 0;
        public $totalPages = 0;
        public $nextPage = 0;
        public $previousPage = 0;
        public $pageNumbersFrom = 0;
        public $pageNumbersTo = 0;
        public $pageNumberIndex = 'page';
        public $pageNumberHashtag = null;
        public $query = null;
        public $urlRewrite = false;
        public $semiUrlRewrite = false;
        
        public $nextPageText = 'پسین';
        public $previousPageText = 'پیشین';
        public $lastPageText = 'واپسین';
        public $firstPageText = 'آغازین';
        
        public $nextPageAnchorCss = '';
        public $previousPageAnchorCss = '';
        public $lastPageAnchorCss = '';
        public $firstPageAnchorCss = '';
        public $pagesNumbersAnchorCss = '';
        
        public $pagesContainerCss = '';
        public $pageHandlesCss = 'page-handles';
        public $selectedPageCss = 'selected-page';
        
        public function __construct() {
            
        }
        
        public function printPageNumbers() {
            echo '<div class="pages">';
            if($this->urlRewrite) {
                echo "<a href='$this->query/$this->pageNumberIndex-1/$this->pageNumberHashtag' class='$this->firstPageAnchorCss'> <div class='$this->pageHandlesCss'>$this->firstPageText</div></a>";
                echo "<a href='$this->query/$this->pageNumberIndex-$this->previousPage/$this->pageNumberHashtag' class='$this->previousPageAnchorCss'> <div class='$this->pageHandlesCss'>$this->previousPageText</div></a>";
                for($i = $this->pageNumbersFrom; $i < $this->pageNumbersTo; $i++):
                    if($i != $this->currentPage):
                        echo "<a href='$this->query/$this->pageNumberIndex-$i/$this->pageNumberHashtag' class='$this->pagesNumbersAnchorCss'> <div>$i</div></a>";
                    else:
                        echo "<a href='$this->query/$this->pageNumberIndex-$i/$this->pageNumberHashtag' class='$this->pagesNumbersAnchorCss'> <div class='$this->selectedPageCss'> $i </div></a>";
                    endif;
                endfor;
                echo "<a href='$this->query/$this->pageNumberIndex-$this->nextPage/$this->pageNumberHashtag' class='$this->nextPageAnchorCss'> <div class='$this->pageHandlesCss'>$this->nextPageText</div></a>";
                echo "<a href='$this->query/$this->pageNumberIndex-$this->totalPages/$this->pageNumberHashtag' class='$this->lastPageAnchorCss'> <div class='$this->pageHandlesCss'>$this->lastPageText</div></a>";
                
            } elseif($this->semiUrlRewrite) {
                echo "<a href='$this->query$this->pageNumberIndex=1$this->pageNumberHashtag' class='$this->firstPageAnchorCss'> <div class='$this->pageHandlesCss'>$this->firstPageText</div></a>";
                echo "<a href='$this->query$this->pageNumberIndex=$this->previousPage$this->pageNumberHashtag' class='$this->previousPageAnchorCss'> <div class='$this->pageHandlesCss'>$this->previousPageText</div></a>";
                for($i = $this->pageNumbersFrom; $i < $this->pageNumbersTo; $i++) {
                    if($i != $this->currentPage) {
                        echo "<a href='$this->query$this->pageNumberIndex=$i$this->pageNumberHashtag' class='$this->pagesNumbersAnchorCss'> <div>$i</div></a>";
                    } else {
                        echo "<a href='$this->query$this->pageNumberIndex=$i$this->pageNumberHashtag' class='$this->pagesNumbersAnchorCss'> <div class='$this->selectedPageCss'> $i </div></a>";
                    }
                }
                echo "<a href='$this->query$this->pageNumberIndex=$this->nextPage$this->pageNumberHashtag' class='$this->nextPageAnchorCss'> <div class='$this->pageHandlesCss'>$this->nextPageText</div></a>";
                echo "<a href='$this->query$this->pageNumberIndex=$this->totalPages$this->pageNumberHashtag' class='$this->lastPageAnchorCss'> <div class='$this->pageHandlesCss'>$this->lastPageText</div></a>";
            } else {
                echo "<a href='?$this->query$this->pageNumberIndex=1$this->pageNumberHashtag' class='$this->firstPageAnchorCss'> <div class='$this->pageHandlesCss'>$this->firstPageText</div></a>";
                echo "<a href='?$this->query$this->pageNumberIndex=$this->previousPage$this->pageNumberHashtag' class='$this->previousPageAnchorCss'> <div class='$this->pageHandlesCss'>$this->previousPageText</div></a>";
                for($i = $this->pageNumbersFrom; $i < $this->pageNumbersTo; $i++) {
                    if($i != $this->currentPage) {
                        echo "<a href='?$this->query$this->pageNumberIndex=$i$this->pageNumberHashtag' class='$this->pagesNumbersAnchorCss'> <div>$i</div></a>";
                    } else {
                        echo "<a href='?$this->query$this->pageNumberIndex=$i$this->pageNumberHashtag' class='$this->pagesNumbersAnchorCss'> <div class='$this->selectedPageCss'> $i </div></a>";
                    }
                }
                echo "<a href='?$this->query$this->pageNumberIndex=$this->nextPage$this->pageNumberHashtag' class='$this->nextPageAnchorCss'> <div class='$this->pageHandlesCss'>$this->nextPageText</div></a>";
                echo "<a href='?$this->query$this->pageNumberIndex=$this->totalPages$this->pageNumberHashtag' class='$this->lastPageAnchorCss'> <div class='$this->pageHandlesCss'>$this->lastPageText</div></a>";
            }
            echo '</div>';
        }
        
        private function calculatePageNumbersTo() {
            $this->pageNumbersTo = $this->pageNumbersFrom + $this->pageNumbersPerPage;
            if($this->pageNumbersTo > $this->totalPages) {
                $this->pageNumbersTo = $this->totalPages + 1;
            }
        }
        
        private function calculatePageNumbersFrom() {
            if(($this->currentPage % $this->pageNumbersPerPage) != 0) {
                $this->pageNumbersFrom = ($this->currentPage - ($this->currentPage % $this->pageNumbersPerPage))+1;
            } else {
                $this->pageNumbersFrom = $this->currentPage - ($this->pageNumbersPerPage - 1);
            }
        }
        
        private function calculateTotalPages() {
            $this->totalPages = ceil((float)($this->rowsCount / $this->rowsPerPage));
        }
        
        private function calculateFromRow() {
            $this->fromRow = ($this->currentPage - 1) * $this->rowsPerPage;
            if($this->fromRow > $this->rowsCount) {
                $this->fromRow = ($this->totalPages - 1) * $this->rowsPerPage;;
            }
        }
        
        private function calculateNextPage() {
            $this->nextPage = $this->currentPage + 1;
            if($this->nextPage > $this->totalPages) {
                $this->nextPage = $this->totalPages;
            }
        }
        
        private function calculatePreviousPage() {
            $this->previousPage = $this->currentPage - 1;
            if($this->previousPage < 1) {
                $this->previousPage = $this->currentPage;
            }
        }
        
        private function calculateCurrentPage() {
            if(isset($_GET[$this->pageNumberIndex])) {
                $currentPage = intval($_GET[$this->pageNumberIndex]);
                if($currentPage > 0) {
                    if($currentPage <= ($this->totalPages + 1)) {
                        $this->currentPage = $currentPage;
                    } else {
                        $this->currentPage = $this->totalPages;
                    }
                } else {
                    $this->currentPage = 1;
                }
            } else {
                $this->currentPage = 1;
            }
        }
        
        private function calculateRowsPerPage() {
            if($this->rowsPerPage == 0) {
                $this->rowsPerPage = 10;
            }
        }
        
        private function calculatePageNumbersPerPage(){
            if($this->pageNumbersPerPage == 0) {
                $this->pageNumbersPerPage = 10;
            }
        }
        
         function init($rowsCount) {
            if($rowsCount > 0) {
                $this->calculatePageNumbersPerPage();
                $this->calculateRowsPerPage();
                $this->rowsCount = $rowsCount;
                $this->calculateTotalPages();
                $this->calculateCurrentPage();
                $this->calculateFromRow();
                $this->calculateNextPage();
                $this->calculatePreviousPage();
                $this->calculatePageNumbersFrom();
                $this->calculatePageNumbersTo();
                return true;
            } else {
                return false;
            }
        }
    };
};
?>