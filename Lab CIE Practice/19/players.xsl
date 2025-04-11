<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/players">
    <html>
      <head>
        <title>Best Indian Cricket Players</title>
        <style>
          table { border-collapse: collapse; }
          th, td { border: 1px solid black; padding: 5px; }
        </style>
      </head>
      <body>
        <h1>Best Indian Cricket Players</h1>
        <table>
          <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Matches</th>
          </tr>
          <xsl:for-each select="player">
            <tr>
              <td><xsl:value-of select="name"/></td>
              <td><xsl:value-of select="role"/></td>
              <td><xsl:value-of select="matches"/></td>
            </tr>
          </xsl:for-each>
        </table>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
