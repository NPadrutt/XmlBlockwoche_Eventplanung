<?xml version="1.0" ?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="http://www.w3.org/1999/xhtml">

	<xsl:output method="xml" doctype-public="-//W3C//DTD XHTML 1.0 Strict//EN"
		doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"
		indent="yes" />

	<xsl:template match="/">

		<table class="uk-table uk-table-divider app_table">
			<tr class="app_table">
				<th>Einschränkung</th>
				<th>Beschreibung</th>
				<th></th>
			</tr>
			<xsl:apply-templates />
		</table>

	</xsl:template>

	<!-- Add rows to table -->

	<xsl:template match="disability">
		<tr class="app_table">
			<td>
				<xsl:value-of select="name_de" />
			</td>
			<td align="left">
				<xsl:value-of select="description_de" />
			</td>
			<td align="left">
				<a class="uk-button uk-button-primary uk-float-right">
					<xsl:attribute name="href">
			    	<xsl:value-of select="concat('events.php?category=', @id)" />
			    </xsl:attribute>
					Zur Übersicht
				</a>
			</td>

		</tr>
	</xsl:template>
</xsl:stylesheet>
