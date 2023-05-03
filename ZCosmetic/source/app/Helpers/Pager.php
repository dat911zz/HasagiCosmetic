<?php
class Pager
{
    function __construct()
    {
    }

    function getStart($limit)
    {
        if (!isset($_GET["page"])) {
            $_GET["page"] = 1;
        }
        return ($_GET["page"] - 1) * $limit;
    }
    function getMaximumPage($countItem, $limit)
    {
        return ceil((float)$countItem / $limit);
    }
    function getButtonPage($curPage, $maximumPage)
    {
        $btnPage = '<ul class="pagination justify-content-center me-auto ms-auto mt-5 mb-10">';
        if ($curPage <= $maximumPage) {
            if ($curPage == 1) {
                $btnPage .= '
                                <li class="page-item">
                                    <a class="page-link" aria-label="First">
                                        <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link previous" aria-label="Previous">
                                        <span class="fa fa-chevron-left" aria-hidden="true"></span>
                                    </a>
                                </li>
                    ';
            } else {
                $btnPage .= '
                                <li class="page-item">
                                    <a class="page-link previous" href="' . $_SERVER['PHP_SELF'] . '?page=1" aria-label="First">
                                        <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link previous" href="' . $_SERVER['PHP_SELF'] . '?page=' . ($curPage - 1) . '" aria-label="Previous">
                                        <span class="fa fa-chevron-left" aria-hidden="true"></span>
                                    </a>
                                </li>
                ';
            }
        }
        $posStart = max($curPage - 2, 1);
        $posEnd = min($maximumPage, $curPage + 2);
        for ($i = $posStart; $i <= $posEnd; $i++) {
            if ($i == $curPage) {
                $btnPage .= '<li class="page-item"><a class="page-link">' . (($i < 10) ? '0' . $i : $i) . '</a></li>';
            } else {
                $btnPage .= '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $i . '">' . (($i < 10) ? '0' . $i : $i) . '</a></li>';
            }
        }
        if ($curPage + 1 <= $maximumPage) {
            $btnPage .= '<li class="page-item">
                                <a class="page-link next" href="' . $_SERVER['PHP_SELF'] . '?page=' . ($curPage + 1) . '" aria-label="Next">
                                    <span class="fa fa-chevron-right" aria-hidden="true"></span>
                                </a>
                            </li>';
        } else {
            $btnPage .= '<li class="page-item">
                                <a class="page-link next" aria-label="Next">
                                    <span class="fa fa-chevron-right" aria-hidden="true"></span>
                                </a>
                            </li>';
        }
        $btnPage .= '</ul>';
        return $btnPage;
    }
}
