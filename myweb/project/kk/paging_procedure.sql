CREATE DEFINER=`root`@`localhost` PROCEDURE `p_pageList`( 
m_pageNo int , 
m_perPageCnt int , 
m_column varchar(1000) , 
m_table varchar(1000) , 
m_condition varchar(1000), 
m_orderBy varchar(200) , 
m_order varchar(200) , 
out m_totalPageCnt int 
)
BEGIN 
SET @pageCnt = 1; 
SET @limitStart = m_pageNo ; 
SET @limitEnd = m_perPageCnt; 
SET @sqlCnt = CONCAT('select count(1) into @pageCnt from ',m_table); 
SET @sql = CONCAT('select ',m_column,' from ',m_table); 
IF m_condition IS NOT NULL AND m_condition <> '' THEN 
SET @sql = CONCAT(@sql,' where ',m_condition); 
SET @sqlCnt = CONCAT(@sqlCnt,' where ',m_condition); 
END IF; 
IF m_orderBy IS NOT NULL AND m_orderBy <> '' THEN 
SET @sql = CONCAT(@sql,' order by ',m_orderBy); 
END IF; 
IF m_order IS NOT NULL AND m_order <> '' THEN 
SET @sql = CONCAT(@sql,' ',m_order); 
END IF; 

SET @sql = CONCAT(@sql, ' limit ', @limitStart, ',', @limitEnd); 
PREPARE s_cnt from @sqlCnt; 
EXECUTE s_cnt; 
DEALLOCATE PREPARE s_cnt; 
SET m_totalPageCnt = @pageCnt; 

PREPARE record from @sql; 
EXECUTE record; 
DEALLOCATE PREPARE record; 
END