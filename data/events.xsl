<?xml version="1.0" ?>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="http://www.w3.org/1999/xhtml">
	<xsl:param name="category" defaultvalue="2"></xsl:param>

	<xsl:output method="xml" doctype-public="-//W3C//DTD XHTML 1.0 Strict//EN"
		doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"
		indent="yes" />

	<xsl:template match="/">
		<table class="uk-table uk-table-divider app_table">

			<tr class="app_table">
				<th>Name</th>
				<th>
					Datum
					<xsl:text disable-output-escaping="yes"> &amp; </xsl:text>
					Ort
				</th>
				<th>Ausgelegt für</th>
				<th>Teilnehmer</th>
				<th>CHF</th>
				<th>Bestellen</th>
			</tr>

			<xsl:for-each select="/events/event">
			   <xsl:sort select="dateTime"/>
				<xsl:variable name="event_node" select="."></xsl:variable>
				<xsl:variable name="event_id" select="@id"></xsl:variable>
				<xsl:if
					test="(document('event_supports_disability.xml')//event_id[text() = $event_id]/../disability_id[text() = $category]) or ($category = 'index')">
					<xsl:variable name="disability_id" select="../disability_id" />
					<tr class="app_table">
						<td>
							<xsl:value-of select="$event_node/name" />
						</td>
						<td>
							<xsl:value-of select="$event_node/date_beginning" />
							<xsl:text disable-output-escaping="yes"> &amp;mdash; </xsl:text>
							<br />
							<xsl:value-of select="$event_node/date_end" />
							<div style="padding:5px 0px;font-size:1em;">
								<xsl:value-of select="$event_node/location" />
							</div>
						</td>
						<td>
							<xsl:for-each
								select="document('event_supports_disability.xml')//event_id[text() = $event_id]">
								<xsl:if test="$event_id = text()">
									<xsl:variable name="event_disability_id" select="../disability_id/text()"></xsl:variable>
									<xsl:value-of
										select="document('disabilities.xml')//disability[@id=$event_disability_id]/name_de/text()"></xsl:value-of>
									<br />
								</xsl:if>
							</xsl:for-each>
						</td>
						<td>
							<xsl:value-of
								select="count(document('applications.xml')//participant/event_id[text() = $event_id]/..)">
							</xsl:value-of>
							/
							<xsl:value-of select="$event_node/max_participants" />
						</td>
						<td>
							<xsl:value-of select="$event_node/participation_fee" />
						</td>
						<td>
							<xsl:choose>
								<xsl:when
									test="count(document('applications.xml')//participant/event_id[text() = $event_id]/..) &lt; $event_node/max_participants">
									<a class="uk-button uk-button-primary" style="width:180px;">
										<xsl:attribute name="href">
									    	<xsl:value-of
											select="concat('application.php?event_id=', $event_id)" />
									    </xsl:attribute>
										Anmelden
									</a>
								</xsl:when>
								<xsl:otherwise>
									<button class="uk-button uk-button-default full"
										disabled="disabled" style="width:180px;">Ausgebucht
									</button>
								</xsl:otherwise>
							</xsl:choose>
						</td>
					</tr>
				</xsl:if>

			</xsl:for-each>
		</table>

	</xsl:template>

	<!-- Add rows to table -->


</xsl:stylesheet>
