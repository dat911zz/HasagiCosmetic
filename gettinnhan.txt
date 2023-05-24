DELIMITER //

CREATE PROCEDURE GetLatestMessage(IN qrMa INT, IN outgoingId INT)
BEGIN
    SELECT *
    FROM tbl_messenger
    WHERE (in_msgs_id = qrMa OR out_msgs_id = qrMa)
        AND (out_msgs_id = outgoingId OR in_msgs_id = outgoingId)
    ORDER BY ma_msg DESC
    LIMIT 1;
END //

DELIMITER ;
