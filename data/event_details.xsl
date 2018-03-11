<?xml version="1.0" ?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="http://www.w3.org/1999/xhtml">
	<xsl:param name="event_id" defaultvalue="2"></xsl:param>

	<xsl:output method="xml" doctype-public="-//W3C//DTD XHTML 1.0 Strict//EN"
		doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"
		indent="yes" />

	<xsl:template match="/">
		<xsl:variable name="event_node" select="//event[@id = $event_id]"></xsl:variable>
		<xsl:value-of select="$event_node/name"></xsl:value-of>
		<br />
		<xsl:value-of select="$event_node/date_beginning" />
		<xsl:text disable-output-escaping="yes"> &amp;mdash; </xsl:text>
		<xsl:value-of select="$event_node/date_end" />
		<br />
		<xsl:value-of select="$event_node/location" /><br/>
		<xsl:value-of
			select="count(document('applications.xml')//participant/event_id[text() = $event_id]/..)">
		</xsl:value-of>
		/
		<xsl:value-of select="$event_node/max_participants" /> Teilnehmer <br/>

		CHF <b><xsl:value-of select="$event_node/participation_fee" /></b>
	</xsl:template>

	<!-- Add rows to table -->


</xsl:stylesheet>
